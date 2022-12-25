<?php

use Slim\App;

$app->add(new Tuupola\Middleware\JwtAuthentication([
    "header" => "token",
    "regexp" => "/(.*)/",
    "path" => "public/api", /* or ["/api", "/admin"] */
    "ignore" => ["public/api/token"],
    "secret" => $container->get('settings')['secretKey']
]));

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite') //sites com permissão para acessar a API
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});