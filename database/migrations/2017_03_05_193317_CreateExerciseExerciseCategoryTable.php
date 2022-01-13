<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseExerciseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('exercise_exercise_category', function(Blueprint $table) {
          $table->integer('exercise_id')->unsigned();
          $table->integer('exercise_category_id')->unsigned();
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
      Schema::drop('exercise_exercise_category');
    }
}
