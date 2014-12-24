<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Moods extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moods', function(Blueprint $table)
		{
			//
		$table->increments('id');
		$table->integer('dj_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
		$table->string('title');
		$table->string('requestor_name');
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
		Schema::dropIfExists('moods');
	}

}
