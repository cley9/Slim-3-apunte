<?php
use Slim\App;
// use controllers\admin\CrudController;
// use controllers\admin\CrudController as cley;
// require __DIR__.'/controllers/admin/CrudController.php';

// return function (App $app){
//     $app->get('/', 'CrudController:home');
// };
// return function (App $app) {
//     $app->get('/', 'CrudController:mark');
//     // $app->get('/', function($request, $response, $args){
//     //     $response->getBody()->write("this is ligth");
//     //         return $response;
//     // });
//     // Agrega más rutas y métodos de controlador aquí según sea necesario
// };

// funcional  
// $app->get('/', function ($request, $response, $args) {
//     $response->getBody()->write("this is ligth");
//     return $response;
// });

$app->get('/', 'CrudController:mark');
// $app->get('/', CrudController::class . ':mark')
// ->setName('hellopage');
// $app->get('/', 'CrudController:mark');
// $app->get('/', 'CrudController:mark');
// $app->get('/', CrudController::class . ':mark')
//     ->setName('hellopage');

    // $this->app->get('/', CrudController::class . 'mark');
// $app->get('/', [cley::class,'mark']);
// $app->run();