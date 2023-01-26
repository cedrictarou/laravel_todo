<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$param = [
			'content' => '部屋を掃除する',
			'tag_id' => 1
		];
		Todo::create($param);

		$param = [
			'content' => '数学の宿題をする',
			'tag_id' => 5
		];
		Todo::create($param);

		$param = [
			'content' => '20分走る',
			'tag_id' => 2
		];
		Todo::create($param);

		$param = [
			'content' => '実家へ帰る',
			'tag_id' => 3
		];
		Todo::create($param);

		$param = [
			'content' => '夕食を作る',
			'tag_id' => 4
		];
		Todo::create($param);
	}
}
