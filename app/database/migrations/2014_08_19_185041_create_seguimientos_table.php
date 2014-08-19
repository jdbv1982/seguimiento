<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeguimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seguimientos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('peticion_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->text('comentario');

			$table->foreign('peticion_id')->references('id')->on('peticiones');
			$table->foreign('user_id')->references('id')->on('users');

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seguimientos');
	}

}
