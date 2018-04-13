<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = [
			[
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'password' => \Hash::make('password'),
			],[
				'name' => 'User',
				'email' => 'user@user.com',
				'password' => \Hash::make('password'),
			]
		];

		foreach ($users as $user) {
			User::updateOrcreate([
				'name' => $user['name'],
				'email' => $user['email']
			],[
				'name' => $user['name'],
				'email' => $user['email'],
				'password' => $user['password']
			]);
		}
	}
}
