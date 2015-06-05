<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parties', function(Blueprint $table)
		{
			/*
			id
			dj_id
			name
			address
			city
			state
			zip
			lat
			long
			start time
			end time
			create time
			update time

			*/
		$table->increments('id');
		$table->integer('dj_id')->unsigned();
		$table->foreign('dj_id')->references('id')->on('users')->onDelete('cascade');
		$table->string('name');
		$table->string('address');
		$table->string('city');
		$table->string('state');
		$table->integer('zip');
		$table->float('lat',6)->nullable();
		$table->float('long',6)->nullable();
		$table->timestamp('start_time');
		$table->timestamp('end_time');
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
		Schema::dropIfExists('parties');
	}

}
