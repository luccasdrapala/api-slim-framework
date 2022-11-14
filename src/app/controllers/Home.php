<?php

namespace App\controllers;

class Home{

    public function index($request, $response){
        return $response->write('teste do index');
    }

}