<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('exercise_variations', function(Blueprint $table) {
        $table->increments('id');
        $table->string('description');
        $table->integer('duration');
        $table->string('outline')->nullable();
        $table->string('goals')->nullable();
        $table->string('tools')->nullable();
        $table->integer('user_id')->unsigned();
        $table->integer('exercise_id')->unsigned();
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
      Schema::drop('exercise_variations');
    }
}
