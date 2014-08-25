<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Municipio;


class MunicipioRepo extends BaseRepo{

	public function getModel(){
		return new Municipio;
	}



}
