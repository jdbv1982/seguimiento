<?php

Route::post('getCatalogoAjax',['as'=>'getCatalogoAjax','uses'=>'AjaxController@getCatalogoAjax']);
Route::post('getTotalSolicitudes',['as'=>'getTotalSolicitudes','uses'=>'AjaxController@getTotalSolicitudes']);


Route::post('getSolicitudesStatus',['as'=>'getSolicitudesStatus','uses'=>'AjaxController@getSolicitudesStatus']);

Route::post('setComentario', ['as'=>'setComentario', 'uses'=>'AjaxController@setComentario']);
Route::post('delComentario', ['as'=>'delComentario', 'uses'=>'AjaxController@delComentario']);
Route::post('getComentarios', ['as'=>'getComentarios', 'uses'=>'AjaxController@getComentarios']);

