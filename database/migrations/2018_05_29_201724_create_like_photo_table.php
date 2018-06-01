<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikePhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('like_photo', function(Blueprint $table)
		{
			$table->integer('Id_photo');
			$table->integer('Id_user')->index('Like_photo_User0_FK');
			$table->boolean('Like_photo');
			$table->primary(['Id_photo','Id_user']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('like_photo');
	}

}
