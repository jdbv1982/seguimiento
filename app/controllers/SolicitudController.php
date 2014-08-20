<?php

use FollowUp\Repositories\SolicitudRepo;

class SolicitudController extends BaseController{

	protected $solicitudRepo;

	public function __construct(SolicitudRepo $solicitudRepo){
		$this->solicitudRepo = $solicitudRepo;
	}

	public function solicitudes(){

		$solicitud = $this->solicitudRepo->find(1);
		//return $solicitud->status->status;

		$solicitudes = $this->solicitudRepo->all();
		return View::make('solicitudes/list', compact('solicitudes'));
	}
}
