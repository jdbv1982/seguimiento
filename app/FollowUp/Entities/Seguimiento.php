<?php namespace FollowUp\Entities;


class Seguimiento extends \Eloquent {

    protected $fillable = array('peticion_id','user_id','comentario');
    protected $table = 'seguimientos';

    public function user(){
        return $this->hasOne('FollowUp\Entities\User','id','user_id');
    }

} 