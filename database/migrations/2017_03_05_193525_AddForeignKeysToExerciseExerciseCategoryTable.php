<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToExerciseExerciseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('exercise_exercise_category', function(Blueprint $table)
      {
        $table->foreign('exercise_id')->references('id')->on('exercises')->onUpdate('CASCADE')->onDelete('CASCADE');
        $table->foreign('exercise_category_id')->references('id')->on('exercise_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('exercise_exercise_category', function(Blueprint $table)
      {
        $table->dropForeign('exercise_exercise_category_exercise_id_foreign');
        $table->dropForeign('exercise_exercise_category_exercise_category_id_foreign');
      });
    }
}
