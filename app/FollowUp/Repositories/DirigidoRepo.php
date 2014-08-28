<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Dirigido;


class DirigidoRepo extends BaseRepo{

	public function getModel(){
		return new Dirigido;
	}

	public function newDirigido(){
		$dirigido = new Dirigido();

		return $dirigido;
	}

	public function deleteAll($id){
		DB::table('dirigidos')->where('peticion_id','=',$id)->delete();
	}


}
