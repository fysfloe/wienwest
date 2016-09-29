<?php

namespace WienWest\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use WienWest\Announcement;
use WienWest\CupGame;
use WienWest\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use WienWest\LeagueGame;
use WienWest\Training;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    private $in_messages = [
        'in' => 'Du bist dabei.',
        'maybe' => 'Du bist vielleicht dabei.',
        'out' => 'Du bist nicht dabei.',
        'not' => 'Bitte gib Bescheid, ob du dabei bist.'
    ];

    protected $contact_rules = [
        'contact-name' => 'required',
        'contact-email' => 'required|email',
        'contact-message' => 'required',
    ];

    protected $contact_messages = [
        'contact-name.required' => 'Wer bist du?',
        'contact-email.required' => 'Was ist deine E-Mail-Adresse?',
        'contact-email.email' => 'Komm schon, gib eine ordentliche Mail-Adresse ein...',
        'contact-message.required' => 'Was willst du?',
    ];

    protected $active = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_variables = [];

        $past_league_game = LeagueGame::where('date', '<', date('Y-m-d'))->orderBy('date', 'desc')->first();
        $next_league_game = LeagueGame::where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->first();

        if($next_league_game !== null) {
            $date1 = new \DateTime($next_league_game->date . ' ' . $next_league_game->start_time);
            $now = new \DateTime();

            $next_league_game->diff = $date1->diff($now);

            if($next_league_game->diff->m < 1)
                $view_variables['next_league_game'] = $next_league_game;

            $key = $next_league_game->replies()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

            if($key !== null) {
                $next_league_game->reply = $this->in_messages[$key->in];
                $next_league_game->reply_key = $key->in;
            } else {
                $next_league_game->reply = $this->in_messages['not'];
            }
        }

        if($past_league_game !== null)
            $view_variables['past_league_game'] = $past_league_game;

        $past_cup_game = CupGame::where('date', '<', date('Y-m-d'))->orderBy('date', 'desc')->first();
        $next_cup_game = CupGame::where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->first();

        if($next_cup_game !== null) {
            $date1 = new \DateTime($next_cup_game->date . ' ' . $next_cup_game->start_time);
            $now = new \DateTime();

            $next_cup_game->diff = $date1->diff($now);

            if($next_cup_game->diff->m < 1)
                $view_variables['next_cup_game'] = $next_cup_game;

            $key = $next_cup_game->replies()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

            if($key !== null) {
                $next_cup_game->reply = $this->in_messages[$key->in];
                $next_cup_game->reply_key = $key->in;
            } else {
                $next_cup_game->reply = $this->in_messages['not'];
            }
        }

        if($past_cup_game !== null)
            $view_variables['past_cup_game'] = $past_cup_game;

        $next_training = Training::where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->first();

        if($next_training !== null) {
            $date1 = new \DateTime($next_training->date . ' ' . $next_training->start_time);
            $now = new \DateTime();

            $next_training->diff = $date1->diff($now);

            if($next_training->diff->m < 1)
                $view_variables['next_training'] = $next_training;

            $key = $next_training->replies()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

            if($key !== null) {
                $next_training->reply = $this->in_messages[$key->in];
                $next_training->reply_key = $key->in;
            } else {
                $next_training->reply = $this->in_messages['not'];
            }
        }

        $announcements = Announcement::orderBy('created_at', 'DESC')->take(3)->get();

        $view_variables['announcements'] = $announcements;
        $view_variables['title'] = 'Homebase';
        $view_variables['active'] = $this->active;

        return view('home')->with($view_variables);
    }

    public function assignRole()
    {
        $user = Auth::user();
        $role = Role::create(['name' => 'admin']);
        $user->assignRole('admin');
    }

    public function imprint()
    {
        return view('imprint');
    }

    public function contact()
    {
        $validator = Validator::make(Input::all(), $this->contact_rules, $this->contact_messages);

        if($validator->passes()) {
            $email = Input::get('contact-email');

            Mail::send(['text' => 'emails.contact'], ['input' => Input::all()], function($m) use ($email) {
                $m->from('admin@fcwienwest.at', 'FC Wien West');
                $m->replyTo($email);

                $m->to('florian.csizmazia@gmail.com', 'Florian Csizmazia')->subject('Nachricht auf fcwienwest.at Intern');
            });

            return Redirect::back()->with('success', 'Dank und Anerkennung für deine Nachricht!');
        }

        return Redirect::back()->withErrors($validator, 'contact')->withInput();
    }
}
