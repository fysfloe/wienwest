<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPlayerTryoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_tryout', function(Blueprint $table)
        {
            $table->foreign('player_id')->references('id')->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('tryout_id')->references('id')->on('tryouts')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_tryout', function(Blueprint $table)
        {
            $table->dropForeign('player_tryout_player_id_foreign');
            $table->dropForeign('player_tryout_tryout_id_foreign');
        });
    }
}
