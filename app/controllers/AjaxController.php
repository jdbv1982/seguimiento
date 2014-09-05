<?php

use FollowUp\Repositories\SolicitudRepo;
use FollowUp\Repositories\SeguimientoRepo;

use FollowUp\Managers\SeguimientoManager;

class AjaxController extends BaseController{

    protected $solicitudRepo;
    protected $seguimientoRepo;

    public function __construct(SolicitudRepo $solicitudRepo, SeguimientoRepo $seguimientoRepo){
        $this->solicitudRepo = $solicitudRepo;
        $this->seguimientoRepo = $seguimientoRepo;
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

    public function getComentarios(){
        $id = $_POST['id'];
        $solicitud = $this->solicitudRepo->find($id);
        return View::make('seguimiento/comentarios', compact('solicitud'));
    }

    public function setComentario(){
        $id = $_POST['id'];
        $comentario = $_POST['comentario'];

        $data = [
            'peticion_id' => $_POST['peticion_id'],
            'user_id' => Auth::user()->id,
            'comentario' => $comentario
        ];

        if($id == 0){
            $comment = $this->seguimientoRepo->newSeguimiento();
            $manager = new SeguimientoManager($comment, $data);
        }else{
            $comment = $this->seguimientoRepo->find($id);
        }

        $manager = new SeguimientoManager($comment,$data);

        if($manager->save()){
            return 'true';
        }else{
            return $manager->getErrors();
        }
    }

    public function delComentario(){
        $id = $_POST['id'];
        if ($this->seguimientoRepo->delete($id)){
            return 'true';
        }
    }


}
