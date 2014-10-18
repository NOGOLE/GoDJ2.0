<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Songs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function(Blueprint $table)
		{
			//
		$table->increments('id');
		$table->string('title');
		$table->string('artist');
		$table->string('requestor_name');
		$table->integer('dj_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
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
		Schema::table('songs', function(Blueprint $table)
		{
			//
		});
	}

}
