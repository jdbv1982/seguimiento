<?php namespace FollowUp\Repositories;

use FollowUp\Entities\Solicitud;

class SolicitudRepo extends BaseRepo{

	public function getModel(){
		return new Solicitud;
	}


}
