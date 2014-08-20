<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Permiso;
use FollowUp\Repositories\UserRepo;

use FollowUp\Managers\PermisoManager;

class PermisoRepo extends BaseRepo{

	public function getModel(){
		return new Permiso;
	}

	public function getPermisos($id){
		$sql = "SELECT p.id, p.nombre,p.descripcion, (SELECT pu.visible FROM permiso_user AS pu WHERE pu.permiso_id = p.id AND pu.user_id = $id) AS visible FROM permisos AS p";

		$permisos = DB::select( DB::raw($sql));

		return $permisos;
	}

	public function allPermisos(){
		return DB::table('permisos')->select('id')->get();
	}

	public function savePermiso($id, $permisos){
		if(is_null($permisos)){$permisos = [];}
		$all = $this->allPermisos();
		for ($i=0; $i < count($all) ; $i++) {
			$p = $this->getPermiso($id, $all[$i]->id);

			if(in_array($all[$i]->id, $permisos)){
				$activo = 1;
			}else{
				$activo = 0;
			}


		$data = [
			'user_id' => $id,
			'permiso_id' => $all[$i]->id,
			'visible'	=> $activo
		];

		if(empty($p)){
			$pactual = new Permiso;
		}else{
			$pactual = Permiso::find($p[0]->id);
		}
		$permisoManager = new PermisoManager($pactual, $data);
		$permisoManager->save();
		}
		return true;
	}
}
