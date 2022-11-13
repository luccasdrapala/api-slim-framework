<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

//padrão Psr-7 - verbo GET
$app->get('/rota/{id}', function(Request $request, Response $response){

    $response->getBody()->write('Retorno com sucesso');
    return $response;
});

//padrão Psr-7 - verbo POST
$app->post('/usuario/adiciona', function(Request $request, Response $response){

    //recuperando dados do post(formulario)
    $post = $request->getParsedBody();

    //normalmente estaria aqui a logica do INSERT 

    return $response->getBody()->write($post['email']);
});

//padrão Psr-7 - verbo PUT
$app->put('/usuario/atualiza/{id}', function(Request $request, Response $response){

    //recuperando dados do post(formulario)
    $post = $request->getParsedBody();
    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];

    //logica para UPDATE no banco

    return $response->getBody()->write('Usuário: '. $id.'-'.$nome.'-'.$email.' - Atualizado com sucesso');

});

//padrão Psr-7 - verbo DELETE
$app->delete('/usuario/remove/{id}', function(Request $request, Response $response){

    //recuperando dados do post(formulario)
    $id = $request->getAttribute('id');

    //logica para DELETE no banco

    return $response->getBody()->write('Usuário: '. $id.' - Deletado com sucesso');

});

 $app->run();   
