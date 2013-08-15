<?php

use Illuminate\Database\Migrations\Migration;

class AddUpdatedAtToEmailValidation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('email_validation', function($table)
		{
			$table->timestamp('updated_at');
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
			$table->drop_column('updated_at');
		});		//
	}

}