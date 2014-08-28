<?php namespace FollowUp\Entities;

class Accion extends \Eloquent {

	protected $fillable = array('peticion_id','atencion_a','seguimiento_a','cumplimiento_a','evaluacion_a');
	protected $table = 'acciones';


}
