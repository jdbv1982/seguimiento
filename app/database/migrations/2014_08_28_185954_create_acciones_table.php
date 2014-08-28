<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('peticion_id')->unsigned();

			$table->boolean('atencion');
			$table->boolean('seguimiento');
			$table->boolean('cumplimiento');
			$table->boolean('evaluacion');

			$table->foreign('peticion_id')->references('id')->on('peticiones');

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
		Schema::drop('acciones');
	}

}
