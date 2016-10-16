<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use WienWest\LeagueGame;
use WienWest\Player;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;
use WienWest\Reply;

class LeagueGameController extends GameController
{
    protected $rules = [
        'round' => 'required|integer',
        'opponent' => 'required',
        'date' => 'required',
        'start_time' => 'required',
        'meeting_time' => 'required',
        'location' => 'required',
    ];

    protected $messages = [
        'round.required' => 'Welche Runde is\' das?',
        'round.integer' => 'Gib eine Zahl bei der Runde ein.',
        'opponent.required' => 'Gegen wen spiel\' ma?',
        'date.required' => 'Wann spiel\' ma?',
        'start_time.required' => 'Wann is\'n Anpfiff?',
        'meeting_time.required' => 'Wann treff\' ma uns?',
        'location.required' => 'Wo spiel\' ma?'
    ];

    protected $active = 'league_games';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming = LeagueGame::where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();
        $past = LeagueGame::where('date', '<', date('Y-m-d'))->orderBy('date', 'desc')->get();

        $view_variables = [
            'upcoming' => $upcoming,
            'past' => $past,
            'title' => 'Meisterschaftsspiele',
            'sidebar' => true,
            'active' => $this->active
        ];

        if(count($upcoming) > 0) {
            $next_opponent = $upcoming[0];

            $date1 = new \DateTime($next_opponent->date . ' ' . $next_opponent->start_time);
            $now = new \DateTime();

            $next_opponent->diff = $date1->diff($now);

            $view_variables['next_opponent'] = $next_opponent;
        }

        if($max_players = $this->getMaxPlayers('league_games')) {
            $view_variables['game_name'] = 'Meisterschaftsspiele';
            $view_variables['max_players'] = $max_players;
        }

        return view('games.league-games.index')->with($view_variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->hasRole('admin')) {
            return view('games.league-games.create')->with(['title' => 'Meisterschaftsspiel erstellen', 'active' => $this->active]);
        } else {
            return Redirect::route('league_games.index')->with('message', 'Herst! Das darfst du nicht...');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make(Input::all(), $this->rules, $this->messages);

        if($validator->passes()) {
            $league_game = Input::all();
            $league_game['user_id'] = $user->id;
            $league_game['home'] = isset($league_game['home']);

            LeagueGame::create($league_game);

            return Redirect::route('league_games.index');
        }

        return Redirect::back()->withErrors($validator, 'league_game_create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = LeagueGame::find($id);
        $players_in = $game->ins()->get();
        $players_maybe = $game->maybes()->get();
        $players_out = $game->outs()->get();

        $reply = $game->replies()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        $replies = $game->replies()->where('content', '!=', '')->orderBy('created_at', 'desc')->with('user.player')->paginate(10);

        $view_variables = [
            'game' => $game,
            'reply' => $reply,
            'players_in' => $players_in,
            'players_maybe' => $players_maybe,
            'players_out' => $players_out,
            'replies' => $replies,
            'title' => 'Meisterschaftsspiel / ' . $game->round . '. Runde',
            'sidebar' => true,
            'active' => $this->active
        ];

        $lineup = $game->lineup()->first();

        if($lineup) {
            $positions = json_decode($lineup->lineup)->positions;

            foreach($positions as $key => $position) {
                $positions->$key = Player::find($position);
            }

            $view_variables['positions'] = $positions;
        }

        if($game->date < date('Y-m-d')) {
            $view_variables['past_game'] = true;
        }

        return view('games.league-games.show')->with($view_variables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = LeagueGame::find($id);
        if (!$game) {
            return Redirect::back()->with('message', 'Schade. Dieses Spiel existiert wohl nicht...');
        } else {
            return view('games.league-games.edit')->with(['game' => $game, 'active' => $this->active, 'title' => 'Meisterschaftsspiel bearbeiten']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules, $this->messages);

        if($validator->passes()) {
            $game = LeagueGame::find($id);
            $game->update(Input::all());

            return Redirect::route('league_games.edit', $id)->with('success', 'Spitze! Das Spiel wurde aktualisiert.');
        }

        return Redirect::back()->withErrors($validator, 'league_game_update')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $league_game = LeagueGame::find($id);
        if($league_game) {
            LeagueGame::destroy($id);
            return Redirect::back()->with('message', 'Spiel gelöscht.');
        } else {
            return Redirect::back()->with('message', 'Versuch\' nicht, etwas zu löschen, was es nicht gibt!');
        }

    }

    public function editResult($id)
    {
        $validator = Validator::make(
            Input::only('home_team', 'away_team'),
            array(
                'home_team' => 'required|between:0,50',
                'away_team' => 'required|between:0,50'
            ),
            array(
                'home_team.required' => 'Beim Heimteam musst du schon irgendwas eingeben...',
                'home_team.between' => 'Beim Heimteam musst du schon irgendwas Sinnvolles eingeben...',
                'away_team.required' => 'Beim Auswärtsteam musst du schon irgendwas eingeben...',
                'away_team.between' => 'Beim Auswärtsteam musst du schon irgendwas Sinnvolles eingeben...'
            )
        );

        if($validator->passes()) {
            $inputs = Input::only('home_team', 'away_team');
            $result = $inputs['home_team'] . ':' . $inputs['away_team'];
            $league_game = LeagueGame::find($id);
            $league_game->update(array('result' => $result));

            return Redirect::back()->with('success', 'Ergebnis eingetragen.');
        }

        return Redirect::back()->withErrors($validator, 'league_game_edit_result')->withInput();
    }

    public function managePlayersShow($id)
    {
        $user = Auth::user();
        if($user->hasRole('admin')) {

            $players = Player::with(['league_games' => function ($query) use ($id) {
                $query->where('league_game_id', '=', $id)->get();
            }])->orderBy('surname')->get();

            $players_replied = $players_no_reply = array();

            foreach($players as $player) {
                if($player->league_games->first()) {
                    $players_replied[] = $player;
                } else {
                    $players_no_reply[] = $player;
                }
            }

            return view('games.league-games.managePlayers')->with(['title' => 'Spieler managen', 'players_replied' => $players_replied, 'players_no_reply' => $players_no_reply, 'game_id' => $id]);
        } else {
            return Redirect::route('league_games.index')->with('message', 'Herst! Das darfst du nicht...');
        }
    }

    public function managePlayersUpdate($id)
    {
        $user = Auth::user();
        if($user->hasRole('admin')) {
            foreach (Input::except('_token') as $key => $input) {
                $player_id = explode('_', $key)[0];

                if($player = Player::find($player_id)->whereHas('league_games', function ($q) use ($id) {
                    $q->where('league_game_id', '=', $id);
                })->find($player_id)) {
                    $player->league_games()->updateExistingPivot($id, ['in' => $input]);
                } else {
                    if($input) {
                        $player = Player::find($player_id);
                        $game = LeagueGame::find($id);
                        $game->participants()->attach($player, array('in' => $input));

                        $reply = Reply::create(['in' => $input, 'user_id' => $player->user()->first()->id, 'repliable_id' => $id, 'repliable_type' => 'WienWest\LeagueGame']);

                        $game->replies()->save($reply);
                    }
                }
            }

            return Redirect::back()->with('success', 'Änderungen übernommen.');
        } else {
            return Redirect::route('league_games.index')->with('message', 'Herst! Das darfst du nicht...');
        }
    }
}
