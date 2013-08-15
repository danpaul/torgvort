<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmailConfirmationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_validation', function($t)
		{
			$t->string('email');
			$t->string('token');
			$t->timestamp('created_at');
		});
		Schema::table('users', function($table)
		{
			$table->boolean('validated')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_validation');
		Schema::table('users', function($table){
			$table->dropColumn('validated');
		});
	}

}