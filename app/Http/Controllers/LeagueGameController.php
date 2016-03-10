<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use WienWest\LeagueGame;
use Auth;
use Illuminate\Support\Facades\Redirect;

class LeagueGameController extends Controller
{
    protected $rules = [

    ];

    protected $messages = [

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $league_games = LeagueGame::all();
        return view('league-game.index')->with(['league_games' => $league_games]);
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
            return view('league-game.create');
        } else {
            return Redirect::route('league_game.index')->with('message', 'Das darfst du nicht...');
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
            if(Player::where('number', Input::get('number'))->first()) {
                $validator->getMessageBag()->add('number-exists', 'Die Nummer hat schon jemand anderer!');
                return Redirect::back()->withErrors($validator)->withInput();
            } else {
                $player = Input::all();
                $player['user_id'] = $user->id;

                Player::create($player);

                return Redirect::route('player.index');
            }
        }

        return Redirect::back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
