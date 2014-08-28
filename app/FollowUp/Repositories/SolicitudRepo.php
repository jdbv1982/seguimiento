<?php namespace FollowUp\Repositories;

use Auth;

use FollowUp\Entities\Solicitud;

class SolicitudRepo extends BaseRepo{

	public function getModel(){
		return new Solicitud;
	}

	public function newSolicitud(){
		$solicitud = new Solicitud();
		$solicitud->status_id = 1;
		$solicitud->user_id = Auth::user()->id;
		return $solicitud;
	}

	public function solicitudes(){
		return Solicitud::with('respuesta','state','user','residencia','dirigidos','dirigidos.departamentos','tipo')->get();
	}

	public function solicitud($id){
		return Solicitud::with('respuesta','state','user','residencia','dirigidos','dirigidos.departamentos','tipo','caracteristica','accion')->where('id','=',$id)->get();
	}

	public function deptos($id){
		$solicitud = Solicitud::find($id);
		$deptos = array();

		foreach ($solicitud->dirigidos as $value) {
			$deptos[] = $value->departamento_id;
		}

		return  $deptos;
	}


}
