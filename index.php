<?php
require 'vendor/autoload.php';
// Inicializar la aplicación Slim
$app = new \Slim\App();
// $app = new \Slim\App($settings);
// Register de mis routes
require __DIR__.'/routes/apiAdmin.php';
require __DIR__.'/routes/apiUser.php';
$middleware=require __DIR__ . '/app/middleware/jwt.tech.apiRest.php';
// require __DIR__.'/controllers/admin/CrudController.php';
// require_once 'routes/apiAdmin.php';
// require_once 'controllers/admin/CrudController.php';
// $routes = require __DIR__ . 'routes/apiAdmin.php';
// $routes($app);
$app->get('/cley', function ($request, $response, $args) {
    $response->getBody()->write("¡Hola, mundo!");
    return $response;
});

$middleware($app);



// Ejecutar la aplicación Slim
$app->run();