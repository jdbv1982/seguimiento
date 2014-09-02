<?php

use FollowUp\Entities\User;

use FollowUp\Repositories\UserRepo;

class AuthController extends BaseController{

    protected $userRepo;

    public function __construct(UserRepo $userRepo){
        $this->userRepo = $userRepo;
    }

	public function login(){
		$data = Input::all();

		$credentials = ['email'=>$data['email'], 'password'=>$data['password']];

		if(Auth::attempt($credentials)){
			return Redirect::back();
		}

		return Redirect::back()->with('login_error', 1);
	}

	public function change(){
		return View::make('users/change-password');
	}

	public function changePassword(){
		$user = $this->userRepo->find(Auth::user()->id);
        if(! empty($user)){
            $user->password = Input::get('password');
            if($user->save()){
                return Redirect::route('home');
            }
        }

	}

	public function logout(){
		Auth::logout();
		return Redirect::route('home');
	}
}
