<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

//routes
$app->group('/api/v1', function(){

    $this->get('/produtos/lista', function(Request $request, Response $response){
        
        $produtos = Produto::get();
        return $response->withJson($produtos);
    });
});
