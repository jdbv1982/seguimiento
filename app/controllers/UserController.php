<?php

use FollowUp\Repositories\UserRepo;
use FollowUp\Entities\User;

use FollowUp\Managers\RegisterManager;

class UserController extends BaseController{

	protected $userRepo;

	public function __construct(UserRepo $userRepo){
		$this->userRepo = $userRepo;
	}

	public function listUsers(){
		$users = $this->userRepo->all();

		return View::make('users/list', compact('users'));
	}

	public function newtUsers(){
		return View::make('users/new');
	}

	public function registerUser(){

		$user = $this->userRepo->newUser();
		$manager = new RegisterManager($user, Input::all());

		if($manager->save()){
			return Redirect::route('list-user');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function showUser($id){
		$user = $this->userRepo->find($id);
		return $user;
	}

}
