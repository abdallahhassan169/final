<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDietMealTable extends Migration {

	public function up()
	{
		Schema::create('diet_meal', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('meal_id');
			$table->integer('diet_id');
		});
	}

	public function down()
	{
		Schema::drop('diet_meal');
	}
}