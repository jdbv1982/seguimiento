<?php

use FollowUp\Repositories\SolicitudRepo;
use FollowUp\Repositories\DepartamentoRepo;
use FollowUp\Repositories\TipoSolicitudRepo;

class SolicitudController extends BaseController{

	protected $solicitudRepo;
	protected $departamentoRepo;
	protected $tipoSolicitudRepo;

	public function __construct(SolicitudRepo $solicitudRepo, DepartamentoRepo $departamentoRepo, TipoSolicitudRepo $tipoSolicitudRepo){
		$this->solicitudRepo = $solicitudRepo;
		$this->departamentoRepo = $departamentoRepo;
		$this->tipoSolicitudRepo = $tipoSolicitudRepo;
	}

	public function solicitudes(){
		$solicitudes = $this->solicitudRepo->solicitudes();
		return View::make('solicitudes/list', compact('solicitudes'));
	}

	public function nueva(){
		$departamentos = $this->departamentoRepo->lists('departamentos');
		$tipos = $this->tipoSolicitudRepo->lists('tiposolicitudes');
		return View::make('solicitudes/nueva',compact('departamentos','tipos'));
	}

	public function registrar(){
		return Input::all();
	}
}
