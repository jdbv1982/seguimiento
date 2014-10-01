<?php

use FollowUp\Managers\SolicitudManager;
use FollowUp\Managers\DirigidoManager;
use FollowUp\Managers\CarateristicaManager;
use FollowUp\Managers\AccionManager;


use FollowUp\Repositories\SolicitudRepo;
use FollowUp\Repositories\DepartamentoRepo;
use FollowUp\Repositories\TipoSolicitudRepo;
use FollowUp\Repositories\ResidenciaRepo;
use FollowUp\Repositories\RespuestaRepo;
use FollowUp\Repositories\RegionRepo;
use FollowUp\Repositories\DistritoRepo;
use FollowUp\Repositories\MunicipioRepo;
use FollowUp\Repositories\LocalidadRepo;
use FollowUp\Repositories\DirigidoRepo;
use FollowUp\Repositories\CaracteristicaRepo;
use FollowUp\Repositories\AccionRepo;

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
	protected $dirigidoRepo;
	protected $caracteristicaRepo;
	protected $accionRepo;

	public function __construct(SolicitudRepo $solicitudRepo, DepartamentoRepo $departamentoRepo, TipoSolicitudRepo $tipoSolicitudRepo,
					ResidenciaRepo $residenciaRepo, RespuestaRepo $respuestaRepo, RegionRepo $regionRepo,
					DistritoRepo $distritoRepo, MunicipioRepo $municipioRepo, LocalidadRepo $localidadRepo,
					DirigidoRepo $dirigidoRepo, CaracteristicaRepo $caracteristicaRepo, AccionRepo $accionRepo){
		$this->solicitudRepo      = $solicitudRepo;
		$this->departamentoRepo   = $departamentoRepo;
		$this->tipoSolicitudRepo  = $tipoSolicitudRepo;
		$this->residenciaRepo     = $residenciaRepo;
		$this->respuestaRepo      = $respuestaRepo;
		$this->regionRepo         = $regionRepo;
		$this->distritoRepo       = $distritoRepo;
		$this->municipioRepo      = $municipioRepo;
		$this->localidadRepo      = $localidadRepo;
		$this->dirigidoRepo       = $dirigidoRepo;
		$this->caracteristicaRepo = $caracteristicaRepo;
		$this->accionRepo = $accionRepo;
	}

	public function solicitudes(){
		$solicitudes = $this->solicitudRepo->solicitudes('status_id','=',1);
		return View::make('solicitudes/list', compact('solicitudes'));
	}

	public function nueva(){
		$departamentos = $this->departamentoRepo->lists('departamentos');
		$tipos = $this->tipoSolicitudRepo->lists('tiposolicitudes');
		$residencias = $this->residenciaRepo->lists('residencias');
		$respuestas = $this->respuestaRepo->lists('respuestas');
		$regiones = $this->regionRepo->lists('regiones');
        $distritos = $this->distritoRepo->lists('distritos');
        $municipios = $this->municipioRepo->lists('municipios');
        $localidades = $this->localidadRepo->lists('localidades');
		return View::make('solicitudes/nueva',compact('departamentos','tipos','residencias','respuestas','regiones','distritos','municipios','localidades'));
	}

	public function registrar(){
		$data = Input::all();
		$solicitud = $this->solicitudRepo->newSolicitud();
		$manager = new SolicitudManager($solicitud, $data);
		if($manager->save()){
			$deptos = Input::get('departamento_id');
			$this->saveDirigidos($deptos, $solicitud->id);

			if(! isset($data['peticion_id'])){
				$data['peticion_id'] =  $solicitud->id;
			}
			$this->saveCaracteristicas($data);
			$this->saveAcciones($data);

			return Redirect::route('solicitudes');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function editar($id){
		$solicitud = $this->solicitudRepo->find($id);
		$departamentos = $this->departamentoRepo->lists('departamentos');
		$tipos = $this->tipoSolicitudRepo->lists('tiposolicitudes');
		$residencias = $this->residenciaRepo->lists('residencias');
		$respuestas = $this->respuestaRepo->lists('respuestas');
		$regiones = $this->regionRepo->lists('regiones');
		$distritos = $this->distritoRepo->lists('distritos');
		$municipios = $this->municipioRepo->lists('municipios');
		$localidades = $this->localidadRepo->lists('localidades');
		$regiones = array(0 => "Seleccione ... ") + $regiones;
		$deptos = $this->solicitudRepo->deptos($id);
		return View::make('solicitudes/editar', compact('solicitud','departamentos','tipos','residencias','respuestas','regiones','distritos',
									'municipios','localidades','deptos'));
	}


	public function update($id){
		$data = Input::all();
		$solicitud = $this->solicitudRepo->find($id);
		$manager = new SolicitudManager($solicitud, $data);
		if($manager->save()){
			$deptos = Input::get('departamento_id');
			$this->saveDirigidos($deptos, $solicitud->id);

			$caracteristica = $this->caracteristicaRepo->newCaracteristica();
			$manager = new CarateristicaManager($caracteristica, $data);
			$caracteristicas = $this->caracteristicaRepo->find($solicitud->caracteristica->id);
			$manager->updateCaracteristicas($caracteristicas, $data);

			$accion = $this->accionRepo->newAccion();
			$manager = new AccionManager($accion, $data);
			$acciones = $this->accionRepo->find($solicitud->accion->id);
			$manager->updateAcciones($acciones, $data);

			return Redirect::route('solicitudes');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}


	public function saveDirigidos($deptos, $peticion){
		$departamentos = $this->solicitudRepo->deptos($peticion);
		if($deptos <> $departamentos){
			$this->dirigidoRepo->deleteAll($peticion);
			for ($i=0; $i < count($deptos) ; $i++) {
				$dirigido = $this->dirigidoRepo->newDirigido();
				$dirigido->peticion_id = $peticion;
				$dirigido->departamento_id = $deptos[$i];
				$dirigido->save();
			}
		}
	}

	public function saveCaracteristicas($data){
		$caracteristica = $this->caracteristicaRepo->newCaracteristica();
		$manager = new CarateristicaManager($caracteristica, $data);
		$manager->save();
	}

	public function saveAcciones($data){
		$accion = $this->accionRepo->newAccion();
		$manager = new AccionManager($accion, $data);
		if( ! $manager->save()){
			dd($manager->getErrors());
		}
	}


}
