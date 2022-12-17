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
    
    $this->post('/produtos/adiciona', function(Request $request, Response $response){
        
        $dados = $request->getParsedBody(); //captura o post
        $produto = Produto::create($dados);
        return $response->withJson($produto);
    });

    $this->get('/produtos/lista/{id}', function(Request $request, Response $response, $args){
        
        $produto = Produto::findOrFail($args['id']);
        return $response->withJson($produto);
    });

});
