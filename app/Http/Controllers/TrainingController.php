<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use WienWest\Training;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

class TrainingController extends GameController
{
    protected $rules = [
        'recurring_times' => 'required_with:recurring|integer|between:1,15',
        'date' => 'required',
        'start_time' => 'required',
        'meeting_time' => 'required',
        'location' => 'required',
    ];

    protected $messages = [
        'recurring_times.required_with' => 'Für wie viele Wochen soll\'s angelegt werden?',
        'recurring_times.integer' => 'Gib\' doch bitte eine ganze Zahl für die Wochen ein, geht das?',
        'recurring_times.between' => 'Übertreib\'s nicht... Maximal 15 Wochen.',
        'date.required' => 'Wann trainier\' ma?',
        'start_time.required' => 'Wann is\'n Trainingsstart?',
        'meeting_time.required' => 'Wann treff\' ma uns?',
        'location.required' => 'Wo trainier\' ma?'
    ];

    protected $active = 'trainings';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming = Training::where('date', '>=', date('Y-m-d'))->orderBy('date')->get();
        $past = Training::where('date', '<', date('Y-m-d'))->get();

        $view_variables = [
            'upcoming' => $upcoming,
            'past' => $past,
            'title' => 'Trainings',
            'sidebar' => true,
            'active' => $this->active
        ];

        if(count($upcoming) > 0) {
            $next_training = $upcoming[0];

            $date1 = new \DateTime($next_training->date . ' ' . $next_training->start_time);
            $now = new \DateTime();

            $next_training->diff = $date1->diff($now);

            $view_variables['next_training'] = $next_training;
        }

        if($max_players = $this->getMaxPlayers('trainings')) {
            $view_variables['game_name'] = 'Trainings';
            $view_variables['max_players'] = $max_players;
        }

        return view('games.trainings.index')->with($view_variables);
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
            return view('games.trainings.create')->with(['title' => 'Training erstellen', 'active' => $this->active]);
        } else {
            return Redirect::route('trainings.index')->with('message', 'Herst! Das darfst du nicht...');
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
            $training = Input::all();
            $training['user_id'] = $user->id;
            if(isset($training['recurring'])) {
                for($i = 1; $i <= $training['recurring_times']; $i++) {
                    $training_new = $training;
                    $date = new \DateTime($training['date']);
                    $date->modify('+'.$i.' week');
                    $training_new['date'] = $date->format('Y-m-d');

                    Training::create($training_new);
                }
            }

            Training::create($training);

            return Redirect::route('trainings.index');
        }

        return Redirect::back()->withErrors($validator, 'training_create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Training::find($id);
        $players_in = $game->ins()->get();
        $players_maybe = $game->maybes()->get();
        $players_out = $game->outs()->get();

        $reply = $game->replies()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        $replies = $game->replies()->where('content', '!=', '')->orderBy('created_at', 'desc')->with('user.player')->paginate(10);

        $view_variables = [
            'game' => $game,
            'reply' => $reply,
            'replies' => $replies,
            'players_in' => $players_in,
            'players_maybe' => $players_maybe,
            'players_out' => $players_out,
            'title' => 'Training',
            'sidebar' => true,
            'active' => $this->active
        ];

        if($game->date < date('Y-m-d') && $game->start_time < date('H:i')) {
            $view_variables['past_game'] = true;
        }

        return view('games.trainings.show')->with($view_variables);
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
        $training = Training::find($id);
        if($training) {
            Training::destroy($id);
            return Redirect::back()->with('message', 'Training gelöscht.');
        } else {
            return Redirect::back()->with('message', 'Versuch\' nicht, etwas zu löschen, was es nicht gibt!');
        }

    }
}
