<?php

namespace WienWest\Http\Controllers;

use WienWest\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
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
        return view('home');
    }

    public function assignRole()
    {
        $user = Auth::user();
        $role = Role::create(['name' => 'admin']);
        $user->assignRole('admin');
    }
}
