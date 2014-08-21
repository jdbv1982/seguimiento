<?php namespace FollowUp\Entities;

class Solicitud extends \Eloquent {

	protected $table = 'peticiones';


	//relaciones con los demas modelos

	public function respuesta(){
		return $this->hasOne('FollowUp\Entities\Respuesta','id','respuesta_id');
	}

	public function state(){
		return $this->hasOne('FollowUp\Entities\Status','id','status_id');
	}

	public function user(){
		return $this->hasOne('FollowUp\Entities\User','id','user_id');
	}

	public function residencia(){
		return $this->hasOne('FollowUp\Entities\Residencia','id','residencia_id');
	}

	public function dirigidos(){
		return $this->hasMany('FollowUp\Entities\Dirigido','peticion_id','id');
	}

	public function tipo(){
		return $this->hasOne('FollowUp\Entities\TipoSolicitud','id','tiposolicitud_id');
	}

	//accessors

	public function getAtnCiudadanaTitleAttribute(){
		return \Lang::get('utils.atn_ciudadana.' . $this->atn_ciudadana);
	}


}
