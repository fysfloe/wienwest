<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tryouts', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('home');
            $table->string('opponent');
            $table->date('date');
            $table->time('start_time');
            $table->time('meeting_time');
            $table->string('location');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('result')->nullable();
            $table->string('lineup');
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
        Schema::drop('tryouts');
    }
}
