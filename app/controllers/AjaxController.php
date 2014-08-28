<?php

class AjaxController extends BaseController{

	public function getCatalogoAjax(){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$campo = $_POST['campo'];
		$data = DB::table($table)->where($campo,'=',$id)->lists('id','nombre');
		return Response::json($data);
	}


}
