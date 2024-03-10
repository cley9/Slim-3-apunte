<?php
//  $container['db'] = function ($c){
//     $settings = $c->get('settings')['db'];
//     $server = $settings['driver'].":host=".$settings['host'].";dbname=".$settings['dbname'];
//     $conn = new PDO($server, $settings["user"], $settings["pass"]);  
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     return $conn;
// };


// //      --------------------------------Version Moderna de conexion de PDO :

// // $Localhost = '92.204.  220.71';
// // $Usuario_BD = 'cley';
// // $Password_BD = 'sac23#cley';
// $Localhost = 'Localhost';
// $Usuario_BD = 'root';
// $Password_BD = '';
// $Nombre_BD = 'dba_ferreteria';//php_imagenpdo
// //$Nombre_BD = 'producto';//php_imagenpdo

// try{
//   $DB_con = new PDO("mysql:host={$Localhost};dbname={$Nombre_BD};charset=UTF8",$Usuario_BD,$Password_BD);
//   $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   // para que muestre los datos de los PDO::FETCH_OBJ

//   //$DB_con->query("set names utf8;");
//   $DB_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
//   $DB_con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
//   return "conexion correcta";
// }
// catch(PDOException $e){
//   echo $e->getMessage();
// }


// $container['db'] = function ($c) {
//     $settings = $c->get('settings')['db'];
//     $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
//         $settings['user'], $settings['pass']);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     return $pdo;
// };

// $container['db'] = function ($c) {
//     $settings = $c->get('settings')['db'];
//     $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'], $settings['user'], $settings['pass']);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     return $pdo;
//   };


$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    try {
        $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'], $settings['user'], $settings['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Conexión establecida correctamente a la base de datos.";
        return $pdo;
    } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
        // Puedes manejar el error de otra manera si lo deseas, como lanzar una excepción o registrar el error.
        return null;
    }
};
