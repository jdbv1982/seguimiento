<?php namespace FollowUp\Entities;

class Dirigido extends \Eloquent {

	protected $table = 'dirigidos';

	public function departamentos(){
		return $this->hasOne('FollowUp\Entities\Departamento','id','departamento_id');
	}


}
