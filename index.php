<?php
require 'vendor/autoload.php';
$settings = require __DIR__ . '/src/setting.php';
// Inicializar la aplicación Slim
$app = new \Slim\App($settings);
$config= require __DIR__.'/src/conection.php';
// require __DIR__.'/app/controllers/BaseController.php';
$config($app);

require __DIR__.'/routes/apiAdmin.php';
require __DIR__.'/routes/apiUser.php';
// require __DIR__.'/src/conection.php';
$middleware=require __DIR__ . '/app/middleware/jwt.tech.apiRest.php';
$middleware($app);

$app->run();