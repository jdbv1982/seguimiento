<?php

use FollowUp\Repositories\SolicitudRepo;

class SolicitudController extends BaseController{

	protected $solicitudRepo;

	public function __construct(SolicitudRepo $solicitudRepo){
		$this->solicitudRepo = $solicitudRepo;
	}

	public function solicitudes(){
		$solicitudes = $this->solicitudRepo->solicitudes();
		return View::make('solicitudes/list', compact('solicitudes'));
	}

	public function nueva(){
		return View::make('solicitudes/nueva');
	}
}
