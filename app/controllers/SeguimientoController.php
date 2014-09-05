<?php

use FollowUp\Repositories\SolicitudRepo;


class SeguimientoController extends BaseController {

    protected $solicitudRepo;

    public function __construct(SolicitudRepo $solicitudRepo){
        $this->solicitudRepo = $solicitudRepo;
    }

    public function seguimiento($id){
        $solicitud = $this->solicitudRepo->find($id);
        return View::make('seguimiento/detalles', compact('solicitud'));
    }


} 