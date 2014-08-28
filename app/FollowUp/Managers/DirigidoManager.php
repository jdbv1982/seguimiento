<?php namespace FollowUp\Managers;

class DirigidoManager extends BaseManager {

	public function getRules(){
		$rules = [
			'peticion_id' 	=> 'required|exists:peticiones,id',
			'departamento_id'	=> 'required|exists:departamentos,id',
		];

		return $rules;
	}



}
