<?php namespace FollowUp\Managers;

class SolicitudManager extends BaseManager {

	public function getRules(){
		$rules = [
			'departamento_id'  => 'required|exists:departamentos,id',
			'respuesta_id'       => 'required',
			'residencia_id'    => 'required',
			'region_id'        => 'required|exists:regiones,id',
			'distrito_id'      => 'required|exists:distritos,id',
			'municipio_id'     => 'required|exists:municipios,id',
			'localidad_id'     => 'required|exists:localidades,id',
			'tiposolicitud_id' => 'required',
			'fecha_direccion'  => 'required',
			'instruccion'      => 'required'
		];

		return $rules;
	}

	public function prepareData($data){
		$data = $this->checkCampo($data, 'ccp');
		$data = $this->checkCampo($data, 'ccp2');
		$data = $this->checkCampo($data, 'ccp3');
		$data = $this->checkCampo($data, 'ccp4');
		$data = $this->checkCampo($data, 'atn_ciudadana');
		$data = $this->checkCampo($data, 'secretaria_tecnica');

		return $data;
	}

}
