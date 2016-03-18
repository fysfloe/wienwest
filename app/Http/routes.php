<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/', 'HomeController@index');
        Route::get('/myProfile', 'PlayerController@myProfile')->name('myProfile');

        Route::resource('players', 'PlayerController');
        Route::resource('league_games', 'LeagueGameController');
        Route::post('league_games/{id}/edit-result', 'LeagueGameController@editResult')->name('league_games.edit_result');
        Route::post('tryouts/{id}/edit-result', 'TryoutController@editResult')->name('tryouts.edit_result');
        Route::get('league_games/{id}/lineup', 'LineupController@lineup')->name('league_games.lineup');
        Route::post('league_games/{id}/lineup', 'LineupController@save')->name('league_games.lineup.save');
        Route::resource('tryouts', 'TryoutController');
        Route::resource('trainings', 'TrainingController');
        Route::resource('replies', 'ReplyController');

    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/role', 'HomeController@assignRole');
    Route::get('/getPlayer', 'PlayerController@getPlayer');
});
