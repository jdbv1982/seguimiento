<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Respuesta;


class RespuestaRepo extends BaseRepo{

	public function getModel(){
		return new Respuesta;
	}



}
