<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Caracteristica;


class CaracteristicaRepo extends BaseRepo{

	public function getModel(){
		return new Caracteristica;
	}

	public function newCaracteristica(){
		$model = new Caracteristica;

		return $model;
	}



}
