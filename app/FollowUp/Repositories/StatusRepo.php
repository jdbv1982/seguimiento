<?php namespace FollowUp\Repositories;

use FollowUp\Entities\Status;

class StatusRepo extends BaseRepo {

    public function getModel(){
        return new Status;
    }

} 