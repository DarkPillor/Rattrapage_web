<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vote', function(Blueprint $table)
		{
			$table->foreign('Id_activity', 'Vote_Activity_FK')->references('Id_activity')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Id_user', 'Vote_User0_FK')->references('Id_user')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vote', function(Blueprint $table)
		{
			$table->dropForeign('Vote_Activity_FK');
			$table->dropForeign('Vote_User0_FK');
		});
	}

}
