<?php

namespace WienWest\Http\Controllers;

use Illuminate\Http\Request;

use WienWest\Player;

use WienWest\Http\Requests;

abstract class GameController extends Controller
{
    protected function getMaxPlayers($game) {
        $players = Player::has($game)->get()->each(function($item, $key) use ($game) {
            switch($game) {
                case 'league_games':
                    $item = $item->league_games_count();
                    break;
                case 'tryouts':
                    $item = $item->tryouts_count();
                    break;
                case 'trainings':
                    $item = $item->trainings_count();
                    break;
                default:
                    break;
            }
        });

        $players = $players->sortByDesc('games_count')->slice(0,3);

        return $players;
    }
}
