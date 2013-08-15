<?php

use Illuminate\Database\Migrations\Migration;

class addId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('email_validation', function($table)
		{
			$table->integer('id');
			//$table->increments('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('email_validation', function($table)
		{
			$table->drop_column('id');
		});
	}
}