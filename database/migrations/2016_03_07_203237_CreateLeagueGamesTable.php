<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_games', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('home');
            $table->integer('round');
            $table->string('opponent');
            $table->date('date');
            $table->time('start_time');
            $table->time('meeting_time');
            $table->string('result')->nullable();
            $table->string('location');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('lineup_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('league_games');
    }
}
