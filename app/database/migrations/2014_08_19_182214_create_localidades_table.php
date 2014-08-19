<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocalidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localidades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('municipio_id')->unsigned();

			$table->string('clave', 5)->nullable();;
			$table->string('nombre');

			$table->foreign('municipio_id')->references('id')->on('municipios');

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
		Schema::drop('localidades');
	}

}
