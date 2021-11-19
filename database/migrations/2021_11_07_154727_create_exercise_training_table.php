<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExerciseTrainingTable extends Migration {

	public function up()
	{
		Schema::create('exercise_training', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('exercise_id');
			$table->integer('training_id');
		});
	}

	public function down()
	{
		Schema::drop('exercise_training');
	}
}