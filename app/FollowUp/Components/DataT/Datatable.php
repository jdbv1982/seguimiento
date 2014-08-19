<?php namespace FollowUp\Components\DataT;


use Illuminate\Support\Facades\Facade;

class Datatable extends Facade {
    protected static function getFacadeAccessor(){ return 'datatable'; }
}
