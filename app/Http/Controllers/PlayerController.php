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
        'number' => 'required|integer|max:99',
        'avatar' => 'required',
    ];

    protected $messages = [
        'firstname.required' => 'Sag mir deinen Vornamen oder schreib\' wenigstens irgendwas rein!',
        'surname.required' => 'Sag mir deinen Nachnamen oder schreib\' wenigstens irgendwas rein!',
        'number.required' => 'Welche Nummer hast oder hättest gern?',
        'number.integer' => 'Weißt du nicht, was eine Nummer ist?',
        'number.max' => 'Übertreib\'s nicht...',
        'avatar.required' => 'Such\' dir ein lustiges Bildchen aus!',
    ];

    protected $avatars = [
        'alonso',
        'bale',
        'balotelli',
        'chicharito',
        'de_gea',
        'gerrard',
        'gomez',
        'henry',
        'iniesta',
        'kaka',
        'messi',
        'ramos',
        'ribery',
        'ronaldinho',
        'ronaldo',
        'rooney',
        'schweinsteiger',
        'suarez',
        'tevez',
        'van_persie',
        'villa',
        'xavi'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();

        return view('players.index')->with('players', $players);
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
        if ($player) {
            return Redirect::route('players.edit', $player->id);
        } else {
            return view('players.create')->with('avatars', $this->avatars);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make(Input::all(), $this->rules, $this->messages);

        if ($validator->passes()) {
            if (Player::where('number', Input::get('number'))->first()) {
                $validator->getMessageBag()->add('number-exists', 'Die Nummer hat schon jemand anderer!');
                return Redirect::back()->withErrors($validator)->withInput();
            } else {
                $player = Input::all();
                $player['user_id'] = $user->id;

                Player::create($player);

                return Redirect::route('myProfile');
            }
        }

        return Redirect::back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        if (!$player) {
            return Redirect::back()->with('message', 'Schade. Dieser Spieler existiert wohl nicht...');
        } else {
            return view('players.show')->with(['player' => $player]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
        if (!$player || $id != Auth::user()->player()->first()->id) {
            return Redirect::back()->with('message', 'Schade. Dieser Spieler existiert wohl nicht...');
        } else {
            return view('players.edit')->with(['player' => $player, 'avatars' => $this->avatars]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules, $this->messages);

        $player = Player::find($id);
        $player->update(Input::all());

        return Redirect::route('players.edit', $id)->with('success', 'Spitze! Dein Profil wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function myProfile()
    {
        $user = Auth::user();
        $player = $user->player()->first();
        if (!$player) {
            return Redirect::route('players.create');
        } else {
            return Redirect::route('players.edit', $player->id);
        }
    }
}
