<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

//routes para geração de token
$app->group('/api/token', function(Request $request, Response $response){

    $dados = $request->getParsedBody();
    $email = $dados['email'] ?? null;
    $senha = $dados['senha'] ?? null;
});