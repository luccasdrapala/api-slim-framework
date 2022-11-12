<?php

require 'vendor/autoload.php';

//necessário para criar as rotas
$app = new \Slim\App;

//nesse caso o parametro {} é obrigatório
$app->get('/rota1/{parametro}', function(){

    echo 'teste rota1';
});

//nesse caso o parametro {} é opcional
$app->get('/rota2[/{id}]', function($request, $response){

    $id = $request->getAttribute('id');
    echo 'id '. $id;
});

//2 parametros opcionais, porém se 1 for passado sempre será o primeiro(parece gambiarra)
$app->get('/rota3[/{parametro1}[/{parametro2}]]', function($request, $response){

    $p1 = $request->getAttribute('parametro1');
    $p2 = $request->getAttribute('parametro2');
    echo 'Parametro 1: '. $p1;
    echo '<br>Parametro 2: '. $p2;
});

$app->run();
