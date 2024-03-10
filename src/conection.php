<?php
use Slim\App;
return function (App $app) {
    $container = $app->getContainer();

    $container['db'] = function ($c) {
        $settings = $c->get('settings')['db'];
        $pdo = new PDO("mysql:host={$settings['host']};dbname={$settings['dbname']};charset=UTF8", $settings['user'], $settings['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // para que muestre los datos de los PDO::FETCH_OBJ
        //$DB_con->query("set names utf8;");f
        // $DB_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        // $DB_con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
};
};