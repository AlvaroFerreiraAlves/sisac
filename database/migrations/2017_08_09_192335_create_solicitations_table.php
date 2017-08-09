<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('matricula')->unique();
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('password');
            $table->boolean('status');
            $table->integer('id_curso');

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
		Schema::drop('solicitations');
	}

}
