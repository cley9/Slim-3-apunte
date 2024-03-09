# Instalación de Slim 3 Manual
### Requisito
- Servidor web con reescritura de URL
- PHP 5.5 o más reciente
> --
- instala composer  
- crea una carpeta
> cd carpeta
- instalo slim 3 el vendor => composer require slim/slim:3.*
- crea un archivo index.php dentro de proyecto
```php
<?php
require 'vendor/autoload.php';
// Inicializar la aplicación Slim
$app = new \Slim\App();
// Definir una ruta de ejemplo
$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("¡Hola, mundo!");
    return $response;
});
// Ejecutar la aplicación Slim
$app->run();
```
- Inicia el servidor de php, slim 3  >=7php || <=8php
> php -S localhost:8000  
```php

```
### Apunte de Slim 3 
```php
// tipos de routers validos en slim 3
$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("this is ligth");
    return $response;
});

$app->get('/', 'CrudController:mark');
$app->get('/', CrudController::class . ':mark')
->setName('hellopage');
```