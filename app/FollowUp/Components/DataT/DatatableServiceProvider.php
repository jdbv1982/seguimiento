<?php namespace FollowUp\Components\DataT;

use Illuminate\Support\ServiceProvider;

class DatatableServiceProvider extends ServiceProvider {

    public function register(){
        $this->app['datatable'] = $this->app->share(function($app){
           $dataBuilder = new DataBuilder($app['view'],$app['files']);
            return $dataBuilder;
        });
    }

}
