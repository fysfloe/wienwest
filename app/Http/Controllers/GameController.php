<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Tryout;
use WienWest\LeagueGame;
use WienWest\CupGame;
use WienWest\Training;
use WienWest\Reply;

use WienWest\Http\Requests;

use WienWest\Player;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

abstract class GameController extends Controller
{
  protected $game_types = [
    'league_games' => [
      'singular' => 'league_game',
      'type' => 'WienWest\LeagueGame',
    ],
    'cup_games' => [
      'singular' => 'cup_game',
      'type' => 'WienWest\CupGame',
    ],
    'tryouts' => [
      'singular' => 'tryout',
      'type' => 'WienWest\Tryout',
    ],
    'trainings' => [
      'singular' => 'training',
      'type' => 'WienWest\Training',
    ],
  ];

  protected function getMaxPlayers($game) {
    $players = Player::has($game)->get()->each(function($item, $key) use ($game) {
      switch($game) {
        case 'league_games':
          $item = $item->league_games_count();
          break;
        case 'tryouts':
          $item = $item->tryouts_count();
          break;
        case 'cup_games':
          $item = $item->cup_games_count();
          break;
        case 'trainings':
          $item = $item->trainings_count();
          break;
        default:
          break;
      }
    });

    $players = $players->sortByDesc('games_count')->slice(0,3);

    return $players;
  }

  public function managePlayersShow($id)
  {
    $user = Auth::user();

    $players = Player::with([$this->active => function ($query) use ($id) {
      $query->where($this->game_types[$this->active]['singular'] . '_id', '=', $id)->withPivot('in')->get();
    }])->orderBy('surname')->get();

    $players_replied = $players_no_reply = array();

    foreach($players as $player) {
      if($player[$this->active]->first()) {
        $players_replied[] = $player;
      } else {
        $players_no_reply[] = $player;
      }
    }

    return view('games.managePlayers')->with([
      'title' => 'Spielerübersicht',
      'players_replied' => $players_replied,
      'players_no_reply' => $players_no_reply,
      'game_id' => $id,
      'active' => $this->active,
    ]);
  }

  public function managePlayersUpdate($id)
  {
    $user = Auth::user();
    if($user->hasRole('admin')) {
      foreach (Input::except('_token') as $key => $input) {
        $player_id = explode('_', $key)[0];

        if($player = Player::find($player_id)->whereHas($this->active, function ($q) use ($id) {
          $q->where($this->game_types[$this->active]['singular'] . '_id', '=', $id);
        })->find($player_id)) {
          switch($this->active) {
            case 'league_games':
              $player->league_games()->updateExistingPivot($id, ['in' => $input]);
              break;
            case 'cup_games':
              $player->cup_games()->updateExistingPivot($id, ['in' => $input]);
              break;
            case 'tryouts':
              $player->tryouts()->updateExistingPivot($id, ['in' => $input]);
              break;
            case 'trainings':
              $player->trainings()->updateExistingPivot($id, ['in' => $input]);
              break;
            default:
              break;
          }
        } else {
          if($input) {
            $player = Player::find($player_id);
            switch($this->active) {
              case 'league_games':
                $game = LeagueGame::find($id);
                break;
              case 'cup_games':
                $game = CupGame::find($id);
                break;
              case 'tryouts':
                $game = Tryout::find($id);
                break;
              case 'trainings':
                $game = Training::find($id);
                break;
              default:
                break;
            }

            $game->participants()->attach($player, array('in' => $input));

            $reply = Reply::create(['in' => $input, 'user_id' => $player->user()->first()->id, 'repliable_id' => $id, 'repliable_type' => $this->game_types[$this->active]['type']]);

            $game->replies()->save($reply);
          }
        }
      }

      return Redirect::back()->with('success', 'Änderungen übernommen.');
    } else {
      return Redirect::route('cup_games.index')->with('message', 'Herst! Das darfst du nicht...');
    }
  }
}
