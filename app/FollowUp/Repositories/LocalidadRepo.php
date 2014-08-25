<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Localidad;


class LocalidadRepo extends BaseRepo{

	public function getModel(){
		return new Localidad;
	}



}
