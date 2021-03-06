<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExercisesTable extends Migration {

	public function up()
	{
		Schema::create('exercises', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('exercises');
	}
}