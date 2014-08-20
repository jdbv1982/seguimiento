<?php

Route::get('list',['as'=>'list-user', 'uses'=>'UserController@listUsers']);

Route::get('new',['as'=>'new-user', 'uses'=>'UserController@newtUsers']);
Route::post('new',['as'=>'register-user', 'uses'=>'UserController@registerUser']);

Route::get('user/{id}',['as'=>'user', 'uses'=>'UserController@showUser']);

Route::get('permisos/{id}',['as'=>'permisos', 'uses'=>'UserController@showPermisos']);
Route::post('permisos/{id}',['as'=>'permisos-update', 'uses'=>'UserController@savePermisos']);
