<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('exercises', function(Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->string('description');
        $table->integer('duration');
        $table->string('outline')->nullable();
        $table->string('goals');
        $table->string('tools');
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
      Schema::drop('exercises');
    }
}
