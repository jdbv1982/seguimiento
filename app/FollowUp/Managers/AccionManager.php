<?php namespace FollowUp\Managers;

class AccionManager extends BaseManager {

	public function getRules(){
		$rules = [
			'peticion_id' => 'required|exists:peticiones,id',
			'atencion_a' => 'in:1,0',
			'seguimiento_a' => 'in:1,0',
			'cumplimiento_a' => 'in:1,0',
			'evaluacion_a' => 'in:1,0'
		];

		return $rules;
	}

	public function prepareData($data){
		$data = $this->checkCampo($data, 'atencion_a');
		$data = $this->checkCampo($data, 'seguimiento_a');
		$data = $this->checkCampo($data, 'cumplimiento_a');
		$data = $this->checkCampo($data, 'evaluacion_a');
		return $data;
	}

	public function updateAcciones($entity, $data){
			$data = $this->prepareData($data);

			$entity->atencion_a = $data['atencion_a'];
			$entity->seguimiento_a = $data['seguimiento_a'];
			$entity->cumplimiento_a = $data['cumplimiento_a'];
			$entity->evaluacion_a = $data['evaluacion_a'];

			$entity->save();
	}


}
