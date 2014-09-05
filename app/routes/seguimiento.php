<?php

Route::get('seguimiento/{id}',['as'=>'seguimiento-solicitud', 'uses'=>'SeguimientoController@seguimiento']);

