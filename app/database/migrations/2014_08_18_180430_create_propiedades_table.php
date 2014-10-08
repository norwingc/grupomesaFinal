<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropiedadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('propiedades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo');
			$table->boolean('estado');
			$table->string('tipopropiedad');
			$table->string('tipoanuncio');
			$table->double('precioventa');
			$table->double('precioalquiler');
			$table->string('tiempo');
			$table->double('precioadmin');
			$table->string('moneda');
			$table->string('estadofisico');
			$table->string('anocontruccion');
			$table->string('areautil');
			$table->string('areaterreno');
			$table->integer('cuartos');
			$table->integer('banos');
			$table->integer('garaje');
			$table->integer('estratos');
			$table->string('descripcion');			
			$table->string('pais');
			$table->string('departamento');
			$table->string('municipio');
			$table->string('zona');
			$table->string('direccion');			
			$table->string('detallecasa');
			$table->string('latitud');
			$table->string('longitud');	
			$table->integer('visitas');				
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
		Schema::drop('propiedades');
	}

}
