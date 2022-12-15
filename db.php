<?php

if (PHP_SAPI != 'cli') {
    
    exit('Rodar via CLI (Linha de comando)');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela);

$schema->create($tabela, function($table){

    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11,2);
    $table->string('fabricante', 60);
    $table->date('dt_criacao');
});

$db->table($tabela)->insert([
    'titulo' => 'Moto G5',
    'descricao' => 'Smartfone Motorola f1',
    'preco' => '1500.00',
    'fabricante' => 'Motorola',
    'dt_criacao' => '2022-12-14'
]);

