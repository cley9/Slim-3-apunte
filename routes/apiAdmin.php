<?php
use Slim\App;
use Firebase\JWT\JWT;
use Tuupola\Middleware\JwtAuthentication;

require __DIR__ . '../../app/controllers/admin/CrudController.php';
require __DIR__ . '../../app/controllers/admin/ViewController.php';
require __DIR__ . '../../app/controllers/admin/LoginController.php';
require __DIR__ . '../../app/middleware/validationAdmin.php';

$app->post('/registro-admin', LoginController::class . ':createAdmin')->setName('create.api.admin');

// $app->add(new JwtAuthentication([
//     "path" => "/api", /* or ["/api", "/admin"] */
//     "secret" => "qwertyuiopasdfghjklzxcvbnm123456",
//     // "algorithm" => ["HS256", "HS384"]
//     // "after" => function ($response, $arguments) {
//     //     return $response->withHeader("X-Brawndo", "plants crave");
//     // }
//     "error" => function ($response, $arguments) {
//         $data["status"] = "error";
//         $data["message"] = $arguments["message"];
//         $response->getBody()->write(
//             json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
//         );
//         return $response->withHeader("Content-Type", "application/json");
//     }
// ]));

$app->group('/api/v1/admin', function () use ($app) {
    // $app->get('/home', function () use ($app) {});
    // $app->post('/registro-user', function ($request, $response, $args) {
    // $app->get('/home', ViewController::class .':home')->setName('home.api.admin');

    $app->get('/home', ViewController::class . ':home')->setName('home.api.admin');

})->add(new validationAdmin());
?>