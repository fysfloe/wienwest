<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use WienWest\Tryout;
use WienWest\Player;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

class TryoutController extends GameController
{
    protected $rules = [
        'opponent' => 'required',
        'date' => 'required',
        'start_time' => 'required',
        'meeting_time' => 'required',
        'location' => 'required',
    ];

    protected $messages = [
        'opponent.required' => 'Gegen wen spiel\' ma?',
        'date.required' => 'Wann spiel\' ma?',
        'start_time.required' => 'Wann is\'n Anpfiff?',
        'meeting_time.required' => 'Wann treff\' ma uns?',
        'location.required' => 'Wo spiel\' ma?'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming = Tryout::where('date', '>=', date('Y-m-d'))->orderBy('date', 'desc')->get();
        $past = Tryout::where('date', '<', date('Y-m-d'))->orderBy('date', 'desc')->get();

        $view_variables = [
            'upcoming' => $upcoming,
            'past' => $past,
            'title' => 'Testspiele',
            'sidebar' => true,
        ];

        if(count($upcoming) > 0) {
            $next_opponent = $upcoming[0];

            $date1 = new \DateTime($next_opponent->date . ' ' . $next_opponent->start_time);
            $now = new \DateTime();

            $next_opponent->diff = $date1->diff($now);

            $view_variables['next_opponent'] = $next_opponent;
        }

        if($max_players = $this->getMaxPlayers('tryouts')) {
            $view_variables['game_name'] = 'Testspiele';
            $view_variables['max_players'] = $max_players;
        }

        return view('games.tryouts.index')->with($view_variables);
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
            return view('games.tryouts.create')->with(['title' => 'Testspiel erstellen', 'sidebar' => true]);
        } else {
            return Redirect::route('tryouts.index')->with('message', 'Herst! Das darfst du nicht...');
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
            $tryout = Input::all();
            $tryout['user_id'] = $user->id;
            $tryout['home'] = isset($tryout['home']);

            Tryout::create($tryout);

            return Redirect::route('tryouts.index');
        }

        return Redirect::back()->withErrors($validator, 'tryout_create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Tryout::find($id);
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
            'title' => 'Testspiel',
            'sidebar' => true
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

        return view('games.tryouts.show')->with($view_variables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Tryout::find($id);
        if (!$game) {
            return Redirect::back()->with('message', 'Schade. Dieses Spiel existiert wohl nicht...');
        } else {
            return view('games.tryouts.edit')->with(['game' => $game, 'sidebar' => true, 'title' => 'Testspiel bearbeiten']);
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
            $game = Tryout::find($id);
            $game->update(Input::all());

            return Redirect::route('tryouts.edit', $id)->with('success', 'Spitze! Das Spiel wurde aktualisiert.');
        }

        return Redirect::back()->withErrors($validator, 'tryout_update')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tryout = Tryout::find($id);
        if($tryout) {
            Tryout::destroy($id);
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
            $tryout = Tryout::find($id);
            $tryout->update(array('result' => $result));

            return Redirect::back()->with('success', 'Ergebnis eingetragen.');
        }

        return Redirect::back()->withErrors($validator, 'tryout_edit_result')->withInput();
    }
}
