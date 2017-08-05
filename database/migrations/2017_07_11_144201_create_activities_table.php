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
            $table->integer('id_tipo_atividade')->unsigned();
            $table->integer('id_processo')->unsigned();

            $table->foreign('id_tipo_atividade')
                ->references('id')->on('activity_types')
                ->onDelete('cascade');

            $table->foreign('id_processo')
                ->references('id')->on('processes')
                ->onDelete('cascade');

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
		Schema::drop('activities');
	}

}
