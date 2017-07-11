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

            $table->integer('activity_types_id')->unsigned();
            $table->foreign('activity_types_id')->references('id')->on('activity_types')->onDelete('cascade');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            // DANDO ERRO NA CRIAÇÃO DA MIGRATE POR REFERENCIAR users_id DUAS VEZES
           // $table->integer('users_id')->unsigned();
           // $table->foreign('users_courses_id')->references('Courses_id')->on('users')->onDelete('cascade');

            $table->integer('regulations_id')->unsigned();
            $table->foreign('regulations_id')->references('id')->on('regulations')->onDelete('cascade');

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
