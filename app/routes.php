<?php

Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);
Route::post('login', ['as'=>'login','uses'=>'AuthController@login']);

Route::group(['before'=>'auth'], function(){
	require (__DIR__ . '/routes/auth.php');
});



