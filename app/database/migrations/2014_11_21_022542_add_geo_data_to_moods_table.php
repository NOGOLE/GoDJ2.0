<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGeoDataToMoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('moods', function(Blueprint $table)
		{
			//add lat long fields
			$table->float('lat');
			$table->float('long');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('moods', function(Blueprint $table)
		{
			//
		});
	}

}
