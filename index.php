<?php

require 'vendor/autoload.php';

//necessário para criar as rotas
$app = new \Slim\App;


$app->get('/rota1', function(){

    echo 'teste rota1';
});

$app->get('/rota2/{id}', function(){

    echo 'teste rota2';
});

$app->run();
