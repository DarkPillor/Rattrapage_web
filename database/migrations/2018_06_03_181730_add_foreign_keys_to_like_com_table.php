<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLikeComTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('like_com', function(Blueprint $table)
		{
			$table->foreign('Id_photo', 'Like_com_Photo_FK')->references('Id_photo')->on('photo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Id_user', 'Like_com_Users0_FK')->references('Id_user')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('like_com', function(Blueprint $table)
		{
			$table->dropForeign('Like_com_Photo_FK');
			$table->dropForeign('Like_com_Users0_FK');
		});
	}

}
