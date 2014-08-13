<?php namespace FollowUp\Components;

use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider {

    public function register(){
        $this->app['field'] = $this->app->share(function($app){
           $fieldBuilder = new FieldBuilder($app['form'], $app['view'], $app['session.store'], $app['files'], $app['translator']);
            return $fieldBuilder;
        });
    }

}
