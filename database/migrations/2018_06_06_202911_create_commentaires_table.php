<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentairesTable extends Migration {

	public function up()
	{
		Schema::create('commentaires', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('photo_id')->unsigned();
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('commentaires');
	}
}
