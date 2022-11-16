<?php

namespace App\controllers;

class Home{

    protected $container;

    public function __construct($container){
        $this->container = $container;
    }

    public function index($request, $response){

        $requisicao = $this->container->get('request');
        // echo '<pre>';
        // var_dump($requisicao);
        // echo '</pre>';
        // return $response->write('teste do index');
        
        $view = $this->container->get('View');
        echo '<pre>';
        var_dump($view);
        echo '</pre>';
        return $response->write('Teste index');

    }

}