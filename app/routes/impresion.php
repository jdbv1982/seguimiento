<?php

Route::get('impresion/{id}',['as'=>'imprimir-solicitud','uses'=>'ImpresionController@imprimeSolicitud']);
