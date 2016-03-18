<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Http\Requests;

use WienWest\LeagueGame;

use Illuminate\Support\Facades\Input;

use Redirect;

class LineupController extends Controller
{
    public function lineup($id)
    {
        $game = LeagueGame::with('ins')->with('lineup')->find($id);

        $view_variables = [
            'game_id' => $id,
            'sidebar' => true,
            'title' => 'Aufstellung gegen ' . $game->opponent,
            'players_droppable' => $game->ins,
        ];

        if($game->lineup) {
            $game->lineup->lineup = json_decode($game->lineup->lineup)->positions;
            $view_variables['lineup'] = $game->lineup;
        }

        return view('games.lineup')->with($view_variables);
    }

    public function save(Request $request, $id)
    {
        $positions = Input::only('positions');

        $lineup = [
            'mode' => Input::only('mode')['mode'],
            'lineup' => json_encode($positions)
        ];

        $league_game = LeagueGame::find($id);

        if($league_game->lineup()->first()) {
            $league_game->lineup()->update($lineup);
        } else {
            $league_game->lineup()->create($lineup);
        }
        return Redirect::back()->with('success', 'Aufstellung gespeichert!');
    }
}
