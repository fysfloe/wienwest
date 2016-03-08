<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }
}
