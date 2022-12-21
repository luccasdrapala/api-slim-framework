<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;
use App\Models\Usuario;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

//routes para geração de token
$app->group('/api/token', function(Request $request, Response $response){ //usuario precisa fazer post para essa rota passando usuario e senha (md5)

    $dados = $request->getParsedBody();
    $email = $dados['email'] ?? null;
    $senha = $dados['senha'] ?? null;

    $usuario = Usuario::where('email', $email)->first(); //recupera o email do usuario (contando que ja esteja validado)

    if(!is_null($usuario) && (md5($senha) === $usuario->senha)){

        //gerar token
        //chave de criptografia
        $secretKey = $this->get('settings')['secretKey']; //vem de settings
        $token = JWT::encode($usuario, $secretKey, 'HS256');

        return $response->withJson([
            'chave' => $token
        ]);
    }
    
    return $response->withJson([
        'status' => 'erro'
    ]);

});