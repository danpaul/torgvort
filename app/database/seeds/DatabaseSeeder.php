<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	/**
	 * Seed users
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		User::create(array('email' => 'email@foo.com', 'name' => 'big john', 'password' => Hash::make('testtest')));
		User::create(array('email' => 'email@bar.com', 'name' => 'little john', 'password' => Hash::make('testtest')));
		User::create(array('email' => 'email@baz.com', 'name' => 'medium john', 'password' => Hash::make('testtest')));
	}

}