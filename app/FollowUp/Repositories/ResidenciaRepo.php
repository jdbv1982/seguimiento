<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Residencia;


class ResidenciaRepo extends BaseRepo{

	public function getModel(){
		return new Residencia;
	}



}
