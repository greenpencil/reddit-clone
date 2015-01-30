<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->truncate();

		$users = [
			[
				'username' => 'Tititesouris',
				'email' => 'tititesouris@laposte.net',
				'password' => Hash::make('quentin')
			],
			[
				'username' => 'greenpencil',
				'email' => 'rstamac@gmail.com',
				'password' => Hash::make('katie123')
			],
		];

		foreach($users as $user){
			User::create($user);
		}
	}

}