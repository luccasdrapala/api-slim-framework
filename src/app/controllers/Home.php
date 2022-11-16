<?php

namespace App\controllers;

class Home{

    protected $container;

    public function __construct($container){
        $this->container = $container;
    }

    public function index($request, $response){

        $requisicao = $this->container->get('request');
        var_dump($requisicao);
        return $response->write('teste do index');
    }

}