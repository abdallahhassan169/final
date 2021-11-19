<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReadingsTable extends Migration {

	public function up()
	{
		Schema::create('readings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->float('reading');
			$table->integer('user_id');
		});
	}

	public function down()
	{
		Schema::drop('readings');
	}
}