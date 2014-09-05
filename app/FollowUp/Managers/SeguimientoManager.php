<?php namespace FollowUp\Managers;

class SeguimientoManager extends BaseManager {

    public function getRules(){
        $rules = [
            'peticion_id' => 'required|exists:peticiones,id',
            'user_id' => 'required|exists:users,id',
            'comentario' => 'required'
        ];

        return $rules;
    }

} 