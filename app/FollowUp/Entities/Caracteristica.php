<?php namespace FollowUp\Entities;

class Caracteristica extends \Eloquent {

	protected $fillable = array('peticion_id','construccion','ampliacion','reconstruccion','conservacion','pasivo','adeudo','pago','viabilidad','evaluacion','validacion','recursos','proyectos','reunion','calidad','observaciones');
	protected $table = 'caracteristicas';

    public function getAttribute($key){

        $campos = $this->attributes;

        unset($campos['observaciones']);

            $inAttributes = array_key_exists($key, $campos);

            if ($inAttributes || $this->hasGetMutator($key))
            {
                return \Lang::get('utils.'. $key .'.' . $this->getAttributeValue($key));
            }

            if (array_key_exists($key, $this->relations))
            {
                return $this->relations[$key];
            }

            $camelKey = camel_case($key);

            if (method_exists($this, $camelKey))
            {
                return $this->getRelationshipFromMethod($key, $camelKey);
            }

            return $this->getAttributeValue($key);


    }

}
