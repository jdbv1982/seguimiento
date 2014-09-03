<?php

Route::get('solicitudes',['as'=>'solicitudes', 'uses'=>'SolicitudController@solicitudes']);

Route::get('nueva',['as'=>'nueva-solicitud', 'uses'=>'SolicitudController@nueva']);
Route::post('registrar',['as'=>'registrar-solicitud','uses'=>'SolicitudController@registrar']);

Route::get('editar/{id}',['as'=>'editar-solicitud', 'uses'=>'SolicitudController@editar']);
Route::post('editar/{id}',['as'=>'update-solicitud', 'uses'=>'SolicitudController@update']);



