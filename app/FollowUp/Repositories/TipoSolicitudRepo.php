<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\TipoSolicitud;


class TipoSolicitudRepo extends BaseRepo{

	public function getModel(){
		return new TipoSolicitud;
	}



}
