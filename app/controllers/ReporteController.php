<?php

use FollowUp\Repositories\ReportesRepo;
use FollowUp\Repositories\RegionRepo;
use FollowUp\Repositories\MunicipioRepo;
use FollowUp\Repositories\DepartamentoRepo;
use FollowUp\Repositories\ResidenciaRepo;

use FollowUp\Services\Rp;
use FollowUp\Services\SolicitudExcel;

class ReporteController extends BaseController {

    protected $reportesRepo;
    protected $regionRepo;
    protected $deptoRepo;
    protected $residenciaRepo;
    protected $municipioRepo;
    protected $solicitudExcel;

    public function __construct(ReportesRepo $reportesRepo, RegionRepo $regionRepo, DepartamentoRepo $deptoRepo, ResidenciaRepo $residenciaRepo, MunicipioRepo $municipioRepo, SolicitudExcel $solicitudExcel ){
        $this->reportesRepo = $reportesRepo;
        $this->regionRepo = $regionRepo;
        $this->deptoRepo = $deptoRepo;
        $this->residenciaRepo = $residenciaRepo;
        $this->municipioRepo = $municipioRepo;
        $this->solicitudExcel = $solicitudExcel;
    }

    public function reportes(){
        return View::make('reportes/reporte');
    }

    public function solicitudes(){
        $years = $this->reportesRepo->getYears();
        $direcciones = $this->deptoRepo->lists('departamentos', ['nombre', 'id']);
        $residencias = $this->residenciaRepo->lists('residencias', ['nombre', 'id']);
        $regiones = $this->regionRepo->lists('regiones', ['nombre', 'id']);
        $municipios = $this->municipioRepo->lists('municipios', ['nombre', 'id']);
        return View::make('reportes/solicitudes', compact('years', 'direcciones','residencias','regiones','municipios') );
    }

    public function imprimirReporte(){

        $year  = Input::has('chkyear') ? Input::get('year') : null;
        $direccion = Input::has('chkdireccion') ? Input::get('direccion') : null;
        $status = $this->prepareStatus();
        $residencia = Input::has('chkresidencia') ? Input::get('residencia') : null;
        $region = Input::has('chkregion') ? Input::get('region') : null;
        $municipio = Input::has('chkmunicipio') ? Input::get('municipio') : null;


        $solicitudes = $this->reportesRepo->solicitudesReport($year, $direccion, $status, $residencia, $region, $municipio);


        return $this->solicitudExcel->printInformacionBase();

        //$rp = new Rp;

        //return $rp->printInformacion();

        //return $solicitudes;
    }

    private function prepareStatus(){
        $status = array();

        $status[] = Input::has('pendiente') ? 1 : 0;
        $status[] = Input::has('finalizados') ? 2 : 0;
        $status[] = Input::has('en_proceso') ? 3 : 0;
        $status[] = Input::has('cancelados') ? 4 : 0;

        $minimouno = 0;
        foreach ($status as &$valor) {
            if($valor > 0){
                $minimouno = 1;
            }
        }

        if ($minimouno == 0) {$status = null;}
        return $status;
    }

}
