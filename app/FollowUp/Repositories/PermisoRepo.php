<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Permiso;

class PermisoRepo extends BaseRepo{

	public function getModel(){
		return new Permiso;
	}

	public function getPermisos($id){
		$sql = "SELECT p.id, p.nombre,p.descripcion, (SELECT pu.visible FROM permiso_user AS pu WHERE pu.permiso_id = p.id AND pu.user_id = $id) AS visible FROM permisos AS p";

		$permisos = DB::select( DB::raw($sql));

		return $permisos;
	}
}
