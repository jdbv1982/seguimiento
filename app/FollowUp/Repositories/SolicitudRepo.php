<?php namespace FollowUp\Repositories;

use FollowUp\Entities\Solicitud;

class SolicitudRepo extends BaseRepo{

	public function getModel(){
		return new Solicitud;
	}

	public function solicitudes(){
		return Solicitud::with('respuesta','state','user')->get();
	}


}
