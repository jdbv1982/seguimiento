<?php namespace FollowUp\Managers;

class CarateristicaManager extends BaseManager {

	public function getRules(){
		$rules = [
			'peticion_id' => 'required|exists:departamentos,id',
			'construccion' => 'in:1,0',
			'ampliacion' => 'in:1,0',
			'reconstruccion' => 'in:1,0',
			'conservacion' => 'in:1,0',
			'pasivo' => 'in:1,0',
			'adeudo' => 'in:1,0',
			'pago' => 'in:1,0',
			'viabilidad' => 'in:1,0',
			'evaluacion' => 'in:1,0',
			'validacion' => 'in:1,0',
			'recursos' => 'in:1,0',
			'proyectos' => 'in:1,0',
			'reunion' => 'in:1,0',
			'calidad' => 'in:1,0'
		];

		return $rules;
	}

	public function prepareData($data){
		$data = $this->checkCampo($data, 'construccion');
		$data = $this->checkCampo($data, 'ampliacion');
		$data = $this->checkCampo($data, 'reconstruccion');
		$data = $this->checkCampo($data, 'conservacion');
		$data = $this->checkCampo($data, 'pasivo');
		$data = $this->checkCampo($data, 'adeudo');
		$data = $this->checkCampo($data, 'pago');
		$data = $this->checkCampo($data, 'viabilidad');
		$data = $this->checkCampo($data, 'evaluacion');
		$data = $this->checkCampo($data, 'validacion');
		$data = $this->checkCampo($data, 'recursos');
		$data = $this->checkCampo($data, 'proyectos');
		$data = $this->checkCampo($data, 'reunion');
		$data = $this->checkCampo($data, 'calidad');
		return $data;
	}

	public function updateCaracteristicas($caracteristicas, $data){
			$data = $this->prepareData($data);

			$caracteristicas->construccion = $data['construccion'];
			$caracteristicas->ampliacion = $data['ampliacion'];
			$caracteristicas->reconstruccion = $data['reconstruccion'];
			$caracteristicas->conservacion = $data['conservacion'];
			$caracteristicas->pasivo = $data['pasivo'];
			$caracteristicas->adeudo = $data['adeudo'];
			$caracteristicas->pago = $data['pago'];
			$caracteristicas->viabilidad = $data['viabilidad'];
			$caracteristicas->evaluacion = $data['evaluacion'];
			$caracteristicas->validacion = $data['validacion'];
			$caracteristicas->recursos = $data['recursos'];
			$caracteristicas->proyectos = $data['proyectos'];
			$caracteristicas->reunion = $data['reunion'];
			$caracteristicas->calidad = $data['calidad'];

			$caracteristicas->save();
	}

}
