<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->longText('descricao');
            $table->string('documento');
            $table->integer('qt_horas');
            $table->boolean('status');
            $table->boolean('situacao');
            $table->timestamps();

            $table->integer('id_tipos_atividades')->unsigned();
            $table->foreign('id_tipos_atividades')->references('id')->on('activity_types')->onDelete('cascade');

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            // DANDO ERRO NA CRIAÇÃO DA MIGRATE POR REFERENCIAR users_id DUAS VEZES
            $table->integer('id_curso_usuario')->unsigned();
            $table->foreign('id_curso_usuario')->references('id_curso')->on('users')->onDelete('cascade');

            $table->integer('id_regulamentos')->unsigned();
            $table->foreign('id_regulamentos')->references('id')->on('regulations')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activities');
	}

}
