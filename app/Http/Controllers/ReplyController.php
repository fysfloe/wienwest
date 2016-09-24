<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use WienWest\LeagueGame;
use WienWest\Reply;

class ReplyController extends Controller
{
    protected $rules = [
        'in' => 'required',
        'repliable_id' => 'required',
    ];

    protected $messages = [
        'in.required' => 'Bist\' jetzt dabei oder nicht?',
        'repliable_id.required' => 'Keine Ahnung, wo du jetzt was posten willst...',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $reply_input = Input::all();
            $reply_input['user_id'] = $user->id;

            $class_name = Input::only('repliable_type')['repliable_type'];

            $game = $class_name::find(Input::only('repliable_id'))->first();

            $reply = Reply::create($reply_input);

            if($player = $game->participants()->where('user_id', $user->id)->first()) {
                $player->pivot->update(array('in' => $reply->in));
                //$league_game->participants()->associate($player, array('in' => $reply->in))->save();
            } else {
                $game->participants()->attach($user->player()->first(), array('in' => $reply->in));
            }

            $game->replies()->save($reply);

            return Redirect::route($game->getTable().'.show', $game->id);
        }

        return Redirect::back()->withErrors($validator, 'reply')->withInput();
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
        $participants = $game->participants()->get();
        $reply = $game->replies()->where('user_id', Auth::user()->id)->last();
        return view('league-games.show')->with(['game' => $game, 'participants' => $participants, 'reply' => $reply]);
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
        $reply = Reply::find($id);
        if($reply && Auth::user()->id == $reply->user_id) {
            Reply::destroy($id);
            return Redirect::back()->with('message', 'Antwort gelöscht.');
        } else {
            return Redirect::back()->with('message', 'Herst! Das darfst du nicht!');
        }

    }
}
