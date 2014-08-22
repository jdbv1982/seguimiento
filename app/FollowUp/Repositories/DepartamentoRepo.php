<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Departamento;


class DepartamentoRepo extends BaseRepo{

	public function getModel(){
		return new Departamento;
	}



}
