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
			$table->dropColumn('start_time');
			$table->dropColumn('end_time');
			$table->timestamp('start_time');
			$table->timestamp('end_time');

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
