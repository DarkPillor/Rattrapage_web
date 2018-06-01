<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commentaire', function(Blueprint $table)
		{
			$table->foreign('Id_photo', 'Commentaire_Photo0_FK')->references('Id_photo')->on('photo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Id_user', 'Commentaire_User_FK')->references('Id_user')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commentaire', function(Blueprint $table)
		{
			$table->dropForeign('Commentaire_Photo0_FK');
			$table->dropForeign('Commentaire_User_FK');
		});
	}

}
