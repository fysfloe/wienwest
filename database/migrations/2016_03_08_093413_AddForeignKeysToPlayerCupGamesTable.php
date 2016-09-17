<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPlayerCupGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cup_game_player', function(Blueprint $table)
        {
            $table->foreign('player_id')->references('id')->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('cup_game_id')->references('id')->on('cup_games')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cup_game_player', function(Blueprint $table)
        {
            $table->dropForeign('player_cup_game_player_id_foreign');
            $table->dropForeign('player_cup_game_cup_game_id_foreign');
        });
    }
}
