<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

//routes
$app->group('/api/v1', function(){

    //lista todos os produtos
    $this->get('/produtos/lista', function(Request $request, Response $response){
        
        $produtos = Produto::get();
        return $response->withJson($produtos);
    });

    //lista produto pelo id
    $this->get('/produtos/lista/{id}', function(Request $request, Response $response, $args){
        
        $produto = Produto::findOrFail($args['id']);
        return $response->withJson($produto);
    });
    
    //adiciona produto
    $this->post('/produtos/adiciona', function(Request $request, Response $response){
        
        $dados = $request->getParsedBody(); //captura o post
        $produto = Produto::create($dados);
        return $response->withJson($produto);
    });

    //atualiza produto pelo id
    $this->put('/produtos/atualiza/{id}', function(Request $request, Response $response, $args){
        
        $dados = $request->getParsedBody();
        $produto = Produto::findOrFail ($args['id']);
        $produto->update( $dados );
        return $response->withJson( $produto );
    });
});
