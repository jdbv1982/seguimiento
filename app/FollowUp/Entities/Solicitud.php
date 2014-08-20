<?php namespace FollowUp\Entities;

class Solicitud extends \Eloquent {

	protected $table = 'peticiones';

	public function respuesta(){
		return $this->hasOne('FollowUp\Entities\Respuesta','id','respuesta_id');
	}

	public function state(){
		return $this->hasOne('FollowUp\Entities\Status','id','status_id');
	}

	public function user(){
		return $this->hasOne('FollowUp\Entities\User','id','user_id');
	}


}
