<?php

Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);
Route::post('login', ['as'=>'login','uses'=>'AuthController@login']);


Route::get('/prueba', function(){
	 $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('A2', 'world!');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="01simple.xls"');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
});



Route::group(['before'=>'auth'], function(){
	require (__DIR__ . '/routes/auth.php');
	require (__DIR__ . '/routes/users.php');
	require (__DIR__ . '/routes/solicitudes.php');
    require (__DIR__ . '/routes/seguimiento.php');


	require (__DIR__ . '/routes/ajax.php');
	require (__DIR__ . '/routes/impresion.php');
});



