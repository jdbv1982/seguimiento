<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

use FollowUp\Entities\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'full_name' => "Administrador General",
			'email'	=> "jdbardav@gmail.com",
			'password' => \Hash::make('admin'),
			'available' => true
		]);
	}

}
