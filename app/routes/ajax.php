<?php

//catalogos
Route::post('getCatalogoAjax',['as'=>'getCatalogoAjax','uses'=>'AjaxController@getCatalogoAjax']);

//solicitudes
Route::post('getTotalSolicitudes',['as'=>'getTotalSolicitudes','uses'=>'AjaxController@getTotalSolicitudes']);
Route::post('getSolicitudesStatus',['as'=>'getSolicitudesStatus','uses'=>'AjaxController@getSolicitudesStatus']);

//seguimiento
Route::post('setComentario', ['as'=>'setComentario', 'uses'=>'AjaxController@setComentario']);
Route::post('delComentario', ['as'=>'delComentario', 'uses'=>'AjaxController@delComentario']);
Route::post('getComentarios', ['as'=>'getComentarios', 'uses'=>'AjaxController@getComentarios']);
Route::post('updateStatus', ['as'=>'update-status', 'uses'=>'AjaxController@updateStatus']);
