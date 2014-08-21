<?php namespace FollowUp\Entities;

class Respuesta extends \Eloquent {

	protected $table = 'respuestas';

	public function solicitud(){
		return $this->belongsTo('FollowUp\Entities\Solicitud');
	}

}
