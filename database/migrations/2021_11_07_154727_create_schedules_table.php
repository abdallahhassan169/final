<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration {

	public function up()
	{
		Schema::create('schedules', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id');
			$table->string('medicine');
			$table->string('photo')->nullable();
			$table->time('time');
			$table->boolean('is_on')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('schedules');
	}
}
