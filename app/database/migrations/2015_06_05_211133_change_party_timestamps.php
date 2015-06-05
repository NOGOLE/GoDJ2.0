<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePartyTimestamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('parties', function(Blueprint $table)
		{
			//
			$table->timestamp('start_time')->change();
			$table->timestamp('end_time')->change();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('parties', function(Blueprint $table)
		{
			//
		});
	}

}
