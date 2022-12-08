<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings'=> [
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();

$container['db'] = function(){

    $capsule = new Capsule;
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'slim',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$app->get('/usuarios', function(Request $request, Response $response){

    $db = $this->get('db'); //acessando instancia do db do container

    $db->schema()->dropIfExists('usuarios');
    
    $db->schema()->create('usuarios', function($table){
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->timestamps();
    });

});

$app->run();  


/**tipos de respostas
 * cabeçalho, texto, Json, XML
 */

// $app->get('/header', function(Request $request, Response $response){
//     //metodo de texto
//     $response->write('Esse é um retorno header');
//     return $response->withHeader('allow', 'PUT')
//                         ->withAddedHeader('Content-Lenght', 10);
// });

// //objeto JSON
// $app->get('/json', function(Request $request, Response $response){

//     return $response->withJson([
//         "nome" => "Luccas Drapala",
//         "endereco" => "Mafra"
//     ]);
// });

// $app->get('/xml', function(Request $request, Response $response){

//     $xml = file_get_contents('arquivo.xml');
//     $response->write($xml);
//     return $response->withHeader('Content-Type', 'application/xml'); 

// });

// //middlewares

// $app->add(function($request, $response, $next){

//     $response->write('Inicio camada 1 + ');
//     return $next($request, $response);

// });

// $app->add(function($request, $response, $next){

//     $response->write('Inicio camada 2 + ');
//     $response = $next($request, $response);
//     $response->write(' + Fim da camada 2');
//     return $response;

// });

// $app->get('/usuarios', function(Request $request, Response $response){

//     $response->write('Ação Principal usuários');

// });

// $app->get('/postagens', function(Request $request, Response $response){

//     $response->write('Ação Principal Postagens');

// });



// class Servico{
//     //somente para fins didaticos
// }

// /**container pimple */
// $container = $app->getContainer();
// $container['servico'] = function(){
//     return new Servico;
// };

// $app->get('/servico', function(Request $request, Response $response){

//     //recebendo dependencia do objeto
//     $servico = $this->get('servico');
//     var_dump($servico);
// });

// /**Controllers como serviço */

// /**container pimple */
// $container = $app->getContainer();
// $container['View'] = function(){
//     return new App\View;
// };

// $app->get('/usuario', '\App\controllers\Home:index');