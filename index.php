<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

class Servico{
    //somente para fins didaticos
}

/**container pimple */
$container = $app->getContainer();
$container['servico'] = function(){
    return new Servico;
}

$app->get('/servico', function(Request $request, REsponse $response){

    $servico = $this->get('servico');
    var_dump($servico);
});

$app->run();   
