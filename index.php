<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

//padrão Psr-7
$app->get('/rota/{id}', function(Request $request, Response $response){

    $response->getBody()->write('Retorno com sucesso');
    return $response;
});

 $app->run();   
