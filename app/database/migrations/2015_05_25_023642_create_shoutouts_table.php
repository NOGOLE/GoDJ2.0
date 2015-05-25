<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoutoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shoutouts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('message');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
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
		Schema::drop('shoutouts');
	}

}
