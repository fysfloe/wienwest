<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use WienWest\Exercise;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

class ExerciseController extends Controller
{

  protected $rules = [
    'title' => 'required',
    'description' => 'required',
    'duration' => 'required|integer|min:1|max:90',
  ];

  protected $messages = [
    'title.required' => 'Gib einen sinnvollen Titel ein, der die Übung beschreibt.',
    'description.required' => 'Wenn du die Übung nicht beschreibst werden wir sie wohl kaum durchführen können...',
    'duration.required' => 'Wie lang\' dauert die Übung denn ungefähr?',
    'duration.integer' => 'Wie lang\' dauert die Übung denn ungefähr (in Minuten)?',
    'duration.min' => 'Mindestens 1 Minute sollte die Übung schon dauern...',
    'duration.max' => 'Die Übung sollte nicht dauern als das ganze Training...',
  ];

  protected $active = 'exercises';

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $exercises = Exercise::orderBy('created_at', 'DESC')->get();

    $view_variables = [
      'title' => 'Übungen',
      'exercises' => $exercises,
      'active' => $this->active
    ];

    return view('exercises.index')->with($view_variables);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('exercises.create')->with(['title' => 'Übung erstellen', 'active' => $this->active]);
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
      $exercise = Input::all();
      $exercise['user_id'] = $user->id;
      $exercise['description'] = str_replace('<p><br></p>', '', clean(Input::get('description')));

      Exercise::create($exercise);

      return Redirect::route('exercises.index');
    }

    return Redirect::back()->withErrors($validator, 'exercise_create')->withInput();
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
