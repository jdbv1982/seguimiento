<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDirigidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dirigidos', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('peticion_id')->unsigned();
			$table->integer('departamento_id')->unsigned();

			$table->foreign('peticion_id')->references('id')->on('peticiones');
			$table->foreign('departamento_id')->references('id')->on('departamentos');



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
		Schema::drop('dirigidos');
	}

}
