<?php namespace FollowUp\Repositories;

use FollowUp\Entities\Seguimiento;

class SeguimientoRepo extends BaseRepo {

    public function getModel(){
        return new Seguimiento;
    }

    public function newSeguimiento(){
        $seguimiento = new Seguimiento();
        return $seguimiento;
    }

} 