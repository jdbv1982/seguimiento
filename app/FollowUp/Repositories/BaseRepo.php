<?php namespace FollowUp\Repositories;

use DB;


abstract class BaseRepo {

	protected $model;

	public function __construct(){
		$this->model = $this->getModel();
	}

	abstract public function getModel();

	public function all(){
		return $this->model->all();
	}

	public function find($id){
		return $this->model->find($id);
	}

	public function getPermiso($user_id, $permiso_id){
		return DB::table('permiso_user')
			->where('user_id','=',$user_id)
			->where('permiso_id','=',$permiso_id,'AND')
			->get();
	}

	public function lists($table,$campos = array('nombre','id')){
		return DB::table($table)->lists($campos[0],$campos[1]);
	}



}
