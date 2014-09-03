<?php

use FollowUp\Repositories\SolicitudRepo;

class AjaxController extends BaseController{

    protected $solicitudRepo;

    public function __construct(SolicitudRepo $solicitudRepo){
        $this->solicitudRepo = $solicitudRepo;
    }

	public function getCatalogoAjax(){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$campo = $_POST['campo'];
		$data = DB::table($table)->where($campo,'=',$id)->lists('id','nombre');
		return Response::json($data);
	}

public function getTotalSolicitudes(){
    $regla = $_POST['regla'];
    $valor = $_POST['status'];

    $data = $this->solicitudRepo->getTotalSolicitud($regla, $valor);

    return Response::json($data);
}

public function getSolicitudesStatus(){
    $regla = $_POST['regla'];
    $valor = $_POST['status'];

    $solicitudes = $this->solicitudRepo->solicitudes('status_id',$regla,$valor);

    return View::make('solicitudes/list-partial', compact('solicitudes'));
    //return Response::json($total);
}


}
