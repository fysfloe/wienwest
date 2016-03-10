<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPlayerLeagueGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_league_game', function(Blueprint $table)
        {
            $table->foreign('player_id')->references('id')->on('players')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('league_game_id')->references('id')->on('league_games')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_league_game', function(Blueprint $table)
        {
            $table->dropForeign('player_league_game_player_id_foreign');
            $table->dropForeign('player_league_game_league_game_id_foreign');
        });
    }
}
