<?php namespace FollowUp\Entities;

class Solicitud extends \Eloquent {
    protected $fillable = array('respuesta_id','status_id','user_id','residencia_id','region_id','distrito_id','municipio_id','localidad_id','tiposolicitud_id','fecha_direccion','instruccion','comentario','ccp','ccp2','ccp3','ccp4','atn_ciudadana','num_oficio','descripcion_solicitud');
    protected $table = 'peticiones';


    //relaciones con los demas modelos

    public function respuesta(){
        return $this->hasOne('FollowUp\Entities\Respuesta','id','respuesta_id');
    }

    public function state(){
        return $this->hasOne('FollowUp\Entities\Status','id','status_id');
    }

    public function user(){
        return $this->hasOne('FollowUp\Entities\User','id','user_id');
    }

    public function residencia(){
        return $this->hasOne('FollowUp\Entities\Residencia','id','residencia_id');
    }

    public function dirigidos(){
        return $this->hasMany('FollowUp\Entities\Dirigido','peticion_id','id');
    }

    public function tipo(){
        return $this->hasOne('FollowUp\Entities\TipoSolicitud','id','tiposolicitud_id');
    }

    public function caracteristica(){
        return $this->hasOne('FollowUp\Entities\Caracteristica','peticion_id','id');
    }

    public function accion(){
        return $this->hasOne('FollowUp\Entities\Accion','peticion_id','id');
    }

    public function region(){
        return $this->hasOne('FollowUp\Entities\Region','id','region_id');
    }

    public function distrito(){
        return $this->hasOne('FollowUp\Entities\Distrito','id','distrito_id');
    }

    public function municipio(){
        return $this->hasOne('FollowUp\Entities\Municipio', 'id', 'municipio_id');
    }

    public function localidad(){
        return $this->hasOne('FollowUp\Entities\Localidad','id','localidad_id');
    }



    //accessors

    public function getAtnCiudadanaTitleAttribute(){
        return \Lang::get('utils.atn_ciudadana.' . $this->atn_ciudadana);
    }


}
