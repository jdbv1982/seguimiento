<?php namespace FollowUp\Repositories;

use FollowUp\Entities\User;

class UserRepo extends BaseRepo{

	public function getModel(){
		return new User;
	}

	public function newUser(){
		$user = new User();
		$user->available = true;
		return $user;
	}
}
