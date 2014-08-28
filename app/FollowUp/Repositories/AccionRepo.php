<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Accion;


class AccionRepo extends BaseRepo{

	public function getModel(){
		return new Accion;
	}

	public function newAccion(){
		$model = new Accion;

		return $model;
	}



}
