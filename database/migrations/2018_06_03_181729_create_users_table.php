<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('Id_user', true);
			$table->string('name', 25);
			$table->string('fristname', 25);
			$table->string('Email_user', 40);
			$table->integer('Type_user');
			$table->string('Avatar', 50)->nullable();
			$table->string('password', 50);
			$table->timestamps();
			$table->dateTime('remember_token')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
