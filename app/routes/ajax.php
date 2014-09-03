<?php

Route::post('getCatalogoAjax',['as'=>'getCatalogoAjax','uses'=>'AjaxController@getCatalogoAjax']);
Route::post('getTotalSolicitudes',['as'=>'getTotalSolicitudes','uses'=>'AjaxController@getTotalSolicitudes']);


Route::post('getSolicitudesStatus',['as'=>'getSolicitudesStatus','uses'=>'AjaxController@getSolicitudesStatus']);
