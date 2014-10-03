<?php

use FollowUp\Repositories\SolicitudRepo;
use FollowUp\Repositories\StatusRepo;


class SeguimientoController extends BaseController {

    protected $solicitudRepo;
    protected $statusRepo;

    public function __construct(SolicitudRepo $solicitudRepo, StatusRepo $statusRepo){
        $this->solicitudRepo = $solicitudRepo;
        $this->statusRepo = $statusRepo;
    }

    public function seguimiento($id){
        $solicitud = $this->solicitudRepo->find($id);
        $status = $this->statusRepo->lists('status', ['status','id']);

        return View::make('seguimiento/detalles', compact('solicitud', 'status'));
    }


} 