<?php

use FollowUp\Repositories\UserRepo;
use FollowUp\Repositories\PermisoRepo;

use FollowUp\Entities\User;

use FollowUp\Managers\RegisterManager;

class UserController extends BaseController{

	protected $userRepo;
	protected $permisoRepo;

	public function __construct(UserRepo $userRepo, PermisoRepo $permisoRepo){
		$this->userRepo = $userRepo;
		$this->permisoRepo = $permisoRepo;
	}

	public function listUsers(){
		$user = User::find(1);

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

	public function showPermisos($id){
		$user = $this->userRepo->find($id);
		$permisos = $this->permisoRepo->getPermisos($id);

		return View::make('users/permisos', compact('permisos','user'));
	}

	public function savePermisos($id){
		dd($id);
		return Input::all();
	}

}
