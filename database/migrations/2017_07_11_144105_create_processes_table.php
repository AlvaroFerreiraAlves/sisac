<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_professor');
            $table->longText('id_coordenador');
            $table->string('matricula')->unique();
            $table->string('situacao');
            $table->boolean('status');
            $table->integer('id_regulamento')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_curso_usuario')->unsigned();

            $table->foreign('id_regulamento')
                ->references('id')->on('regulations')
                ->onDelete('cascade');

            $table->foreign('id_usuario')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('id_curso_usuario')
                ->references('id')->on('users')
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
		Schema::drop('processes');
	}

}
