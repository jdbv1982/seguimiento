<?php

use FollowUp\Services\SolicitudPdf;
use FollowUp\Repositories\SolicitudRepo;



class ImpresionController extends BaseController{

    protected $solicitudPdf;
    protected $solicitudRepo;

    public function __construct(SolicitudPdf $solicitudPdf, SolicitudRepo $solicitudRepo){
        $this->solicitudPdf = $solicitudPdf;
        $this->solicitudRepo = $solicitudRepo;
    }

	public function imprimeSolicitud($id){
        $solicitud = $this->solicitudRepo->find($id);
        $this->solicitudPdf->imprime($solicitud);

	}


}
