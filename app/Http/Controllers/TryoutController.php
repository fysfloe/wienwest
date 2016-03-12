<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use WienWest\Tryout;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

class TryoutController extends Controller
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
        $upcoming = Tryout::where('date', '>=', date('Y-m-d'))->orderBy('date')->get();
        $past = Tryout::where('date', '<', date('Y-m-d'))->get();

        $view_variables = [
            'upcoming' => $upcoming,
            'past' => $past,
            'title' => 'Testspiele',
        ];

        if(count($upcoming) > 0) {
            $next_opponent = $upcoming[0];

            $date1 = new \DateTime($next_opponent->date . ' ' . $next_opponent->start_time);
            $now = new \DateTime();

            $next_opponent->diff = $date1->diff($now);

            $view_variables['next_opponent'] = $next_opponent;
        }

        return view('tryouts.index')->with($view_variables);
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
            return view('tryouts.create')->with(['title' => 'Testspiel erstellen']);
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
        $game = Tryout::find($id);
        $players_in = $game->ins()->get();
        $players_maybe = $game->maybes()->get();
        $players_out = $game->outs()->get();

        $reply = $game->replies()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        $replies = $game->replies()->get();

        return view('tryouts.show')->with([
            'game' => $game,
            'reply' => $reply,
            'replies' => $replies,
            'players_in' => $players_in,
            'players_maybe' => $players_maybe,
            'players_out' => $players_out,
            'title' => 'Testspiel'
        ]);
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
        $tryout = Tryout::find($id);
        if($tryout) {
            Tryout::destroy($id);
            return Redirect::back()->with('message', 'Spiel gelöscht.');
        } else {
            return Redirect::back()->with('message', 'Versuch\' nicht, etwas zu löschen, was es nicht gibt!');
        }

    }
}
