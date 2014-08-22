<?php

Route::get('solicitudes',['as'=>'solicitudes', 'uses'=>'SolicitudController@solicitudes']);

Route::get('nueva',['as'=>'nueva-solicitud', 'uses'=>'SolicitudController@nueva']);

Route::post('registrar',['as'=>'registrar-solicitud','uses'=>'SolicitudController@registrar']);
