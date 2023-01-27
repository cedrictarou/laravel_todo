<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$param = [
			'name' => 'test1',
			'email' => 'test1@email.com',
			'password' => 'testtest'
		];
		User::create($param);

		$param = [
			'name' => 'test2',
			'email' => 'test2@email.com',
			'password' => 'testtest'
		];
		User::create($param);
	}
}
