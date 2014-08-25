<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Distrito;


class DistritoRepo extends BaseRepo{

	public function getModel(){
		return new Distrito;
	}



}
