<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

//routes
$app->group('/api/v1', function(){

    $this->get('/produtos', function(Request $request, Response $response){
        
        return $response->withJson(['nome'=>'Iphone']);
    });
});
