<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vote', function(Blueprint $table)
		{
			$table->integer('Id_activity');
			$table->integer('Id_user')->index('Vote_Users0_FK');
			$table->boolean('vote');
			$table->time('Time_vote');
			$table->dateTime('Date_vote');
			$table->primary(['Id_activity','Id_user']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vote');
	}

}
