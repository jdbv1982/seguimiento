<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaracteristicasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('caracteristicas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('peticion_id')->unsigned();

			$table->boolean('construccion');
			$table->boolean('ampliacion');
			$table->boolean('reconstruccion');
			$table->boolean('conservacion');
			$table->boolean('gestion');
			$table->boolean('pasivo');
			$table->boolean('adeudo');
			$table->boolean('pago');
			$table->boolean('viabilidad');
			$table->boolean('gestion_tecnica');
			$table->boolean('evaluacion');
			$table->boolean('validacion');
			$table->boolean('recursos');
			$table->boolean('proyectos');
			$table->boolean('reunion');
			$table->boolean('calidad');
			$table->text('observaciones');

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
		Schema::drop('caracteristicas');
	}

}
