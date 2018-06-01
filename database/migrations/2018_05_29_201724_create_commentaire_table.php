<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentaire', function(Blueprint $table)
		{
			$table->integer('Id_com', true);
			$table->string('Description_com', 300);
			$table->date('Date_com');
			$table->integer('Id_user')->index('Commentaire_User_FK');
			$table->integer('Id_photo')->index('Commentaire_Photo0_FK');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commentaire');
	}

}
