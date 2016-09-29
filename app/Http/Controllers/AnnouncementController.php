<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Announcement;
use WienWest\Http\Requests;

use WienWest\LeagueGame;
use WienWest\Player;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

class AnnouncementController extends GameController
{
    protected $rules = [
        'title' => 'required',
        'text' => 'required'
    ];

    protected $messages = [
        'title.required' => 'Gib dem bitte einen Titel.',
        'text.required' => 'Was willst du bitte ankündigen?'
    ];

    protected $active = 'announcements';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'DESC')->get();

        $view_variables = [
            'title' => 'Ankündigungen',
            'announcements' => $announcements,
            'active' => $this->active
        ];

        return view('announcements.index')->with($view_variables);
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
            return view('announcements.create')->with(['title' => 'Ankündigung erstellen', 'active' => $this->active]);
        } else {
            return Redirect::route('announcements.index')->with('message', 'Herst! Das darfst du nicht...');
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
            $announcement = Input::all();
            $announcement['user_id'] = $user->id;
            $announcement['text'] = str_replace('<p><br></p>', '', clean(Input::get('text')));

            Announcement::create($announcement);

            return Redirect::route('announcements.index');
        }

        return Redirect::back()->withErrors($validator, 'announcement_create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);

        $reply = $announcement->replies()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        $replies = $announcement->replies()->where('content', '!=', '')->orderBy('created_at', 'desc')->with('user.player')->paginate(10);

        $other_announcements = Announcement::where('id', '!=', $id)->take(30)->get();

        $view_variables = [
            'reply' => $reply,
            'replies' => $replies,
            'title' => 'Ankündigung / ' . $announcement->title,
            'sidebar' => true,
            'announcement' => $announcement,
            'other_announcements' => $other_announcements,
            'active' => $this->active
        ];

        return view('announcements.show')->with($view_variables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        if (!$announcement) {
            return Redirect::back()->with('message', 'Schade. Diese Ankündigung existiert wohl nicht...');
        } else {
            return view('announcements.edit')->with(['announcement' => $announcement, 'title' => 'Ankündigung bearbeiten', 'active' => $this->active]);
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
            $announcement = Announcement::find($id);
            $announcement->update(Input::all());

            return Redirect::route('announcements.edit', $id)->with('success', 'Spitze! Die Ankündigung wurde aktualisiert.');
        }

        return Redirect::back()->withErrors($validator, 'announcement_update')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        if($announcement) {
            Announcement::destroy($id);
            return Redirect::back()->with('message', 'Ankündigung gelöscht.');
        } else {
            return Redirect::back()->with('message', 'Versuch\' nicht, etwas zu löschen, was es nicht gibt!');
        }

    }
}
