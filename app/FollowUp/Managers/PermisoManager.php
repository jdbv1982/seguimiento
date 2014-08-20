<?php namespace FollowUp\Managers;

class PermisoManager extends BaseManager {

	public function getRules(){
		$rules = [
			'user_id' 	=> 'required',
			'permiso_id'	=> 'required',
			'visible'		=> 'in:1,0'
		];

		return $rules;
	}

}
