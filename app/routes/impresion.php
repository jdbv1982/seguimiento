<?php

Route::get('impresion/{id}',['as'=>'imprimir-solicitud','uses'=>'ImpresionController@imprimeSolicitud']);

Route::get('reportes',['as'=>'reportes', 'uses'=>'ReporteController@reportes']);
Route::get('reportes/solicitudes',['as'=>'reporte-solicitudes', 'uses'=>'ReporteController@solicitudes']);

Route::post('reportes/imprimir', ['as'=>'reporte-imprimir', 'uses'=>'ReporteController@imprimirReporte']);
