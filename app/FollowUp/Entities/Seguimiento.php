<?php namespace FollowUp\Entities;


class Seguimiento extends \Eloquent {

    protected $table = 'seguimientos';

    public function user(){
        return $this->hasOne('FollowUp\Entities\User','id','user_id');
    }

} 