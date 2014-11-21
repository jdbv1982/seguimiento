<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Solicitud;
use FollowUp\Entities\Departamento;

class ReportesRepo {

    public function solicitudes($campo, $regla, $valor){
        return Solicitud::with('respuesta','state','user','residencia','region','distrito','municipio','localidad','dirigidos','dirigidos.departamentos','tipo')->where($campo,$regla,$valor)->orderBy('id','desc')->get();
    }

    public function getYears(){
        $years = array();
        $a = DB::select(DB::raw("SELECT DISTINCT(YEAR(fecha_direccion)) AS anio
                                    FROM peticiones
                                    WHERE YEAR(fecha_direccion) > 0"));

        foreach ($a as $value) {
            $years[$value->anio] = $value->anio;
        }

        return $years;


    }

/*    public function solicitudesReport($year = null, $direccion=null){

        //$solicitudes = Solicitud::with(['respuesta','state','user','residencia','region','distrito','municipio','localidad',dirigidos','dirigidos.departamentos','tipo'])

        $solicitudes = Solicitud::with(['respuesta','state','user','residencia','region','distrito','municipio','localidad',
            'dirigidos','dirigidos.departamentos','tipo'])
        ->where(function($q) use ($year, $direccion){
                            if(! is_null($year)){
                                   $q->where(DB::raw('YEAR(fecha_direccion)'), '=', $year);
                            }
             })->get();

                return $solicitudes;
    }*/

    public function solicitudesReport($year, $direccion,$status, $residencia, $region, $municipio){

         $solicitudes = Solicitud::with(['respuesta','state','user','residencia','region','distrito','municipio','localidad','dirigidos','dirigidos.departamentos','tipo'])
         ->join('dirigidos as d','d.peticion_id','=','peticiones.id')
        ->where(function($q) use ($year, $direccion, $status, $residencia, $region, $municipio){
                            if(! is_null($year)){
                                   $q->where(DB::raw('YEAR(fecha_direccion)'), '=', $year);
                            }
                            if(! is_null($direccion)){
                                   $q->where('d.departamento_id', '=', $direccion);
                            }
                            if(! is_null($status)){
                                    $q->whereIn('status_id', $status);
                            }
                            if(! is_null($residencia)){
                                    $q->where('residencia_id','=',$residencia);
                            }
                            if(! is_null($region)){
                                    $q->where('region_id','=',$region);
                            }
                            if(! is_null($municipio)){
                                    $q->where('municipio_id','=',$municipio);
                            }
             })->get();

            return $solicitudes;
    }


}
