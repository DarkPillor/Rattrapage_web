<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoteTable extends Migration {

	public function up()
	{
		Schema::create('vote', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('activities_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('vote');
	}
}