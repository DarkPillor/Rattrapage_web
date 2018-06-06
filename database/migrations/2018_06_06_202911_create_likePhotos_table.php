<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikePhotosTable extends Migration {

	public function up()
	{
		Schema::create('likePhotos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('photo_id')->unsigned();
			$table->timestamps();
			$table->tinyInteger('isLike');
		});
	}

	public function down()
	{
		Schema::drop('likePhotos');
	}
}