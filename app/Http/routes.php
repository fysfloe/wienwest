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
        Route::get('/calendar', 'CalendarController@index');

        Route::resource('players', 'PlayerController');
        Route::post('players/{id}/change-password', 'PlayerController@changePassword');
        Route::resource('league_games', 'LeagueGameController');
        Route::post('league_games/{id}/edit-result', 'LeagueGameController@editResult')->name('league_games.edit_result');
        Route::post('tryouts/{id}/edit-result', 'TryoutController@editResult')->name('tryouts.edit_result');
        Route::post('cup_games/{id}/edit-result', 'CupGameController@editResult')->name('cup_games.edit_result');
        Route::get('{game_type}/{id}/lineup', 'LineupController@lineup')->name('lineup');
        Route::post('{game_type}/{id}/lineup', 'LineupController@save')->name('lineup.save');
        Route::resource('tryouts', 'TryoutController');
        Route::resource('cup_games', 'CupGameController');
        Route::resource('trainings', 'TrainingController');
        Route::resource('replies', 'ReplyController');
        Route::resource('announcements', 'AnnouncementController');

        Route::get('league_games/{id}/manage-players', 'LeagueGameController@managePlayersShow')->name('league_games.manage_players_show');
        Route::post('league_games/{id}/manage-players', 'LeagueGameController@managePlayersUpdate')->name('league_games.manage_players_update');
        Route::get('cup_games/{id}/manage-players', 'CupGameController@managePlayersShow')->name('cup_games.manage_players_show');
        Route::post('cup_games/{id}/manage-players', 'CupGameController@managePlayersUpdate')->name('cup_games.manage_players_update');
        Route::get('tryouts/{id}/manage-players', 'TryoutController@managePlayersShow')->name('tryouts.manage_players_show');
        Route::post('tryouts/{id}/manage-players', 'TryoutController@managePlayersUpdate')->name('tryouts.manage_players_update');
        Route::get('trainings/{id}/manage-players', 'TrainingController@managePlayersShow')->name('trainings.manage_players_show');
        Route::post('trainings/{id}/manage-players', 'TrainingController@managePlayersUpdate')->name('trainings.manage_players_update');

        Route::resource('cal', 'CalendarController');
        Route::get('oauth', 'CalendarController@oauth')->name('oauthCallback');
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/role', 'HomeController@assignRole');
    Route::get('/getPlayer', 'PlayerController@getPlayer');

    Route::get('/imprint', 'HomeController@imprint');

    Route::post('/contactform', 'HomeController@contact');
});
