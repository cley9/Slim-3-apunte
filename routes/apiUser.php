<?php
use Slim\App;
require __DIR__.'../../app/controllers/user/ViewController.php';
$app->get('/cliente',ClienteController::class.':cliente')->setName('dasss');


// require __DIR__.'../../app/controllers/admin/CrudController.php';

$app->get('/jose', CrudController::class . ':mark')->setName('hellopage');


?>