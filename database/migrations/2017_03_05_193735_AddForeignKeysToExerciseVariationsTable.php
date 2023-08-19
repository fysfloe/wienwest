<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToExerciseVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('exercise_variations', function(Blueprint $table)
      {
        $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
        $table->foreign('exercise_id')->references('id')->on('exercises')->onUpdate('CASCADE')->onDelete('RESTRICT');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('exercise_variations', function(Blueprint $table)
      {
        $table->dropForeign('exercise_variations_user_id_foreign');
        $table->dropForeign('exercise_variations_exercise_id_foreign');
      });
    }
}
