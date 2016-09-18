<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\CupGame;
use WienWest\Http\Requests;

use WienWest\LeagueGame;

use Illuminate\Support\Facades\Input;

use Redirect;
use WienWest\Tryout;

class LineupController extends Controller
{
    public function lineup($game_type, $id)
    {
        switch($game_type) {
            case 'tryouts':
                $game = Tryout::with('ins')->with('lineup')->find($id);
                break;
            case 'league_games':
                $game = LeagueGame::with('ins')->with('lineup')->find($id);
                break;
            case 'cup_games':
                $game = CupGame::with('ins')->with('lineup')->find($id);
                break;
            default:
                break;
        }

        $view_variables = [
            'game_id' => $id,
            'game_type' => $game_type,
            'sidebar' => true,
            'title' => 'Aufstellung gegen ' . $game->opponent,
            'players_droppable' => $game->ins,
        ];

        if($game->lineup) {
            $game->lineup->lineup = json_decode($game->lineup->lineup)->positions;
            $view_variables['lineup'] = $game->lineup;
        }

        return view('games.lineup')->with($view_variables);
    }

    public function save(Request $request, $game_type, $id)
    {
        $positions = Input::only('positions');

        $lineup = [
            'mode' => Input::only('mode')['mode'],
            'lineup' => json_encode($positions)
        ];

        switch($game_type) {
            case 'tryouts':
                $game = Tryout::find($id);
                break;
            case 'league_games':
                $game = LeagueGame::find($id);
                break;
            case 'cup_games':
                $game = CupGame::find($id);
                break;
            default:
                $game = null;
                break;
        }

        if($game && $game->lineup()->first()) {
            $game->lineup()->update($lineup);
        } else {
            $game->lineup()->create($lineup);
        }
        return Redirect::back()->with('success', 'Aufstellung gespeichert!');
    }
}
