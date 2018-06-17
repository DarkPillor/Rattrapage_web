<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitiesTable extends Migration {

	public function up()
	{
		Schema::create('activities', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
		
			$table->string('name');
			$table->text('description');
			$table->tinyInteger('repeat');
			$table->string('date');
			$table->time('time');
			$table->boolean('validate');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('activities');
	}
}
