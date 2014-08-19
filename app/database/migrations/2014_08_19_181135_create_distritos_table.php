<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistritosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distritos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('region_id')->unsigned();

			$table->string('clave', 3)->nullable();
			$table->string('nombre', 100);

			$table->foreign('region_id')->references('id')->on('regiones');

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
		Schema::drop('distritos');
	}

}
