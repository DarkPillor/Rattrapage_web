<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLikePhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('like_photo', function(Blueprint $table)
		{
			$table->foreign('Id_photo', 'Like_photo_Photo_FK')->references('Id_photo')->on('photo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Id_user', 'Like_photo_User0_FK')->references('Id_user')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('like_photo', function(Blueprint $table)
		{
			$table->dropForeign('Like_photo_Photo_FK');
			$table->dropForeign('Like_photo_User0_FK');
		});
	}

}
