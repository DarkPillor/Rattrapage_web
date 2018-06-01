<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photo', function(Blueprint $table)
		{
			$table->foreign('Id_activity', 'Photo_Activity0_FK')->references('Id_activity')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Id_user', 'Photo_User_FK')->references('Id_user')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('photo', function(Blueprint $table)
		{
			$table->dropForeign('Photo_Activity0_FK');
			$table->dropForeign('Photo_User_FK');
		});
	}

}
