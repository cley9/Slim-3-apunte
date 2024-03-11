<?php
use Slim\App;
use Firebase\JWT\JWT;

require __DIR__ . '../../app/controllers/admin/CrudController.php';
require __DIR__ . '../../app/controllers/admin/ViewController.php';
require __DIR__ . '../../app/controllers/admin/LoginController.php';
require __DIR__ . '../../app/middleware/validationAdmin.php';

$app->post('/registro-admin', LoginController::class . ':createAdmin')->setName('create.api.admin');
// $app->post('/create-client', function ($request, $response, $args) use ($app) {
//     $container = $app->getContainer();
//     $db = $container->get('db');
//     $LoginController = new LoginController($db);
//     return $LoginController->createAdmin($request, $response, $args);
// });

$app->group('/api/v1/admin', function () use ($app) {
        
    $app->get('/home', ViewController::class . ':home')->setName('home.api.admin');
    $app->get('/save', ViewController::class . ':save')->setName('save.api.admin');
    // $app->get('/yun', ViewController::class .':yun')->setName('yun.api.admin');
    $app->get('/yun', function ($request, $response, $args) use ($app) {
        $container = $app->getContainer(); // Obtener el contenedor de dependencias
        $db = $container->get('db'); // Obtener la instancia de la base de datos desde el contenedor
        $viewController = new ViewController($db);
        return $viewController->yun($request, $response, $args);
    });

    $app->post('/create-client', function ($request, $response, $args) use ($app) {
        $container = $app->getContainer();
        $db = $container->get('db');
        $CrudController = new CrudController($db);
        return $CrudController->createClient($request, $response, $args);
    });

    $app->get('/list-client', function ($request, $response, $args) use ($app) {
        $container = $app->getContainer();
        $db = $container->get('db');
        $CrudController = new CrudController($db);
        return $CrudController->listClient($request, $response, $args);
    });
    
    $app->put('/update-client/{dniClient}', function ($request, $response, $args) use ($app) {
        $container = $app->getContainer();
        $db = $container->get('db');
        $CrudController = new CrudController($db);
        return $CrudController->updateClient($request, $response, $args);
    });
    
    $app->delete('/delete-client/{dniClient}', function ($request, $response, $args) use ($app) {
        $container = $app->getContainer();
        $db = $container->get('db');
        $CrudController = new CrudController($db);
        return $CrudController->deleteClient($request, $response, $args);
    });


})->add(new validationAdmin());