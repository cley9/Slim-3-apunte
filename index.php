<?php
require 'vendor/autoload.php';
$settings = require __DIR__ . '/src/setting.php';
// Inicializar la aplicación Slim
$app = new \Slim\App($settings);
$config= require __DIR__.'/src/conection.php';
// require __DIR__.'/app/controllers/BaseController.php';
// app/controllers/
$config($app);


// // Registrar la instancia de la base de datos en el contenedor
// $container = $app->getContainer();
// $container['db'] = function ($c) {
//     // Configuración de la base de datos...
// };
// // Registrar BaseController y pasarle la instancia de la base de datos
// $container[BaseController::class] = function ($c) {
//     return new BaseController($c->get('db'));
// };

// $app->get('/', function ($request, $response, $args) use ($app) {
//     $container = $app->getContainer(); // Obtiene el contenedor de dependencias
//     $dbSettings = $container->get('settings')['db']; // Obtiene la configuración de la base de datos del contenedor
//     try {
//         $container['db'] = function ($c) {
//         $settings = $c->get('settings')['db'];
//         $pdo = new PDO("mysql:host={$settings['host']};dbname={$settings['dbname']};charset=UTF8", $settings['user'], $settings['pass']);
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//         return $pdo;
// };
//         return "conexion correcta";
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }
// });

require __DIR__.'/routes/apiAdmin.php';
require __DIR__.'/routes/apiUser.php';
// require __DIR__.'/src/conection.php';
$middleware=require __DIR__ . '/app/middleware/jwt.tech.apiRest.php';
$middleware($app);

$app->run();