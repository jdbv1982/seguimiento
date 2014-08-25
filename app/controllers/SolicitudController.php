<?php

use FollowUp\Repositories\SolicitudRepo;
use FollowUp\Repositories\DepartamentoRepo;
use FollowUp\Repositories\TipoSolicitudRepo;
use FollowUp\Repositories\ResidenciaRepo;
use FollowUp\Repositories\RespuestaRepo;
use FollowUp\Repositories\RegionRepo;
use FollowUp\Repositories\DistritoRepo;
use FollowUp\Repositories\MunicipioRepo;
use FollowUp\Repositories\LocalidadRepo;

class SolicitudController extends BaseController{

	protected $solicitudRepo;
	protected $departamentoRepo;
	protected $tipoSolicitudRepo;
	protected $residenciaRepo;
	protected $respuestaRepo;
	protected $regionRepo;
	protected $distritoRepo;
	protected $municipioRepo;
	protected $localidadRepo;

	public function __construct(SolicitudRepo $solicitudRepo, DepartamentoRepo $departamentoRepo, TipoSolicitudRepo $tipoSolicitudRepo,
					ResidenciaRepo $residenciaRepo, RespuestaRepo $respuestaRepo, RegionRepo $regionRepo,
					DistritoRepo $distritoRepo, MunicipioRepo $municipioRepo, LocalidadRepo $localidadRepo){
		$this->solicitudRepo = $solicitudRepo;
		$this->departamentoRepo = $departamentoRepo;
		$this->tipoSolicitudRepo = $tipoSolicitudRepo;
		$this->residenciaRepo = $residenciaRepo;
		$this->respuestaRepo = $respuestaRepo;
		$this->regionRepo = $regionRepo;
		$this->distritoRepo = $distritoRepo;
		$this->municipioRepo = $municipioRepo;
		$this->localidadRepo = $localidadRepo;
	}

	public function solicitudes(){
		$solicitudes = $this->solicitudRepo->solicitudes();
		return View::make('solicitudes/list', compact('solicitudes'));
	}

	public function nueva(){
		$departamentos = $this->departamentoRepo->lists('departamentos');
		$tipos = $this->tipoSolicitudRepo->lists('tiposolicitudes');
		$residencias = $this->residenciaRepo->lists('residencias');
		$respuestas = $this->respuestaRepo->lists('respuestas');
		$regiones = $this->regionRepo->lists('regiones');
		$regiones = array(0 => "Seleccione ... ") + $regiones;
		return View::make('solicitudes/nueva',compact('departamentos','tipos','residencias','respuestas','regiones'));
	}

	public function registrar(){
		return Input::all();
	}

	public function getCatalogoAjax(){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$campo = $_POST['campo'];
		$data = DB::table($table)->where($campo,'=',$id)->lists('id','nombre');
		return Response::json($data);
	}
}
