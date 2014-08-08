<?php

Route::get('logout',['as'=>'logout', 'uses'=>'AuthController@logout']);
Route::get('change',['as'=>'change','uses'=>'AuthController@change']);

Route::post('update',['as'=>'update-password','uses'=>'AuthController@changePassword']);
