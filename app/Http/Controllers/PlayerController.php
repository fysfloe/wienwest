<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use Auth;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Input;
use WienWest\Player;

class PlayerController extends Controller
{
    protected $rules = [
        'firstname' => 'required',
        'surname' => 'required',
        'number' => 'required|integer',
        'avatar' => 'required',
    ];

    protected $messages = [
        'firstname.required' => 'Sag mir deinen Vornamen oder schreib\' wenigstens irgendwas rein!',
        'surname.required' => 'Sag mir deinen Nachnamen oder schreib\' wenigstens irgendwas rein!',
        'number.required' => 'Welche Nummer hast oder hättest gern?',
        'number.integer' => 'Weißt du nicht, was eine Nummer ist?',
        'avatar.required' => 'Such\' dir ein lustiges Bildchen aus!',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $player = Player::where('user_id', '=', $user->id)->first();
        if(!$player) {
            return Redirect::route('player.create');
        } else {
            return view('player.index')->with(['player' => $player]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $player = Player::where('user_id', '=', $user->id)->first();
        if($player) {
            return Redirect::route('player.edit', $player->id);
        } else {
            return view('player.create');
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
