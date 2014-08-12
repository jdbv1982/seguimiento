<?php namespace FollowUp\Managers;

class RegisterManager extends BaseManager {

	public function getRules(){
		$rules = [
			'full_name' => 'required',
			'email'		=> 'required|email|unique:users,email',
			'password'	=> 'required'
		];

		return $rules;
	}

}
