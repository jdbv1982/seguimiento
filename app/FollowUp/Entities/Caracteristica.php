<?php namespace FollowUp\Entities;

class Caracteristica extends \Eloquent {

	protected $fillable = array('peticion_id','construccion','ampliacion','reconstruccion','conservacion','pasivo','adeudo','pago','viabilidad','evaluacion','validacion','recursos','proyectos','reunion','calidad','observaciones');
	protected $table = 'caracteristicas';


}
