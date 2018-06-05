<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity', function(Blueprint $table)
		{
			$table->integer('Id_activity', true);
			$table->date('Date_activity');
			$table->string('Name_activity', 50);
			$table->string('Description_activity', 300);
			$table->boolean('Repeat_activity');
			$table->integer('Id_user')->index('Activity_Users_FK');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activity');
	}

}
