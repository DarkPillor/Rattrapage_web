<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('activities', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('activities', function(Blueprint $table) {
			$table->foreign('photo_id')->references('id')->on('photos')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('vote', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('vote', function(Blueprint $table) {
			$table->foreign('activities_id')->references('id')->on('activities')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('photos', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('likePhotos', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('likePhotos', function(Blueprint $table) {
			$table->foreign('photo_id')->references('id')->on('photos')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('activities', function(Blueprint $table) {
			$table->dropForeign('activities_user_id_foreign');
		});
		Schema::table('activities', function(Blueprint $table) {
			$table->dropForeign('activities_photo_id_foreign');
		});
		Schema::table('vote', function(Blueprint $table) {
			$table->dropForeign('vote_user_id_foreign');
		});
		Schema::table('vote', function(Blueprint $table) {
			$table->dropForeign('vote_activities_id_foreign');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->dropForeign('commentaires_user_id_foreign');
		});
		Schema::table('photos', function(Blueprint $table) {
			$table->dropForeign('photos_user_id_foreign');
		});
		Schema::table('likePhotos', function(Blueprint $table) {
			$table->dropForeign('likePhotos_user_id_foreign');
		});
		Schema::table('likePhotos', function(Blueprint $table) {
			$table->dropForeign('likePhotos_photo_id_foreign');
		});
	}
}