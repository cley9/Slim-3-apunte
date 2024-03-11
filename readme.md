# Requisitos par Slim 3 ApiRest
- Tener instalado Php>7.4
- Mysql 8
- Tener instalado Composer de manera global
# Archivos 
- Importar la coleción del apiRest a tu postman, está en la ruta 
> /src/Tech.postman_collection 
- WebSite deployado the proyect Tech in this url [ https://]
# Deploy local
- Descargar el proyecto Tech back-end [ ]
- Ejecuta composer install
- Ejecuta en mySql el script.sql de dbaTech, esta en el proyecto en la carpeta de models
- Ejecute [ php -S localhost:8080 ]

- Nota : En la carpeta src/setting.php esta la configuración del base de dato mysql-8
````npm
 'settings' => [

        'db' => [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'dbname' => 'tech',
            // 'driver' => 'mysql'
        ],
        'jwt' => [
            'secret' => 'qwertyuiopasdfghjklzxcvbnm123456'
        ]
    ],
````
# Rutas de apiRest 
### Registrarte como administrador para consumir las apiRest

- Metodo Create Administrador
> http://localhost:8080/registro-user

### Rutas Protegidas

- Metodo Post
> http://localhost:8080/api/v1/admin/create-client

- Metodo Get
> http://localhost:8080/api/v1/admin/list-client

- Metodo Put
> http://localhost:8080/api/v1/admin/update-client/77712228

- Metodo Delete
> http://localhost:8080/api/v1/admin/delete-client/227138812


- Metodo home
> http://localhost:8080/api/v1/admin/home

#### Nota : Primero debes de create una cuenta administrador para que obtengas el token, debido a que la rutas estan protegidas, esto quiere decir que solo el rol admin puede acceder . 


# Ahora descarga el GitHub del entorno del Frond-end 
- Repositorio del git [https://github.com/cley9/React-17] 
- Sigue los pasos que indica en el repositorio del frond-end



# Omitir lo de a bajo, es para crear proyecto
#### Nota : Lo de a bajo son apunte de como se crea un proyecto en Slim 3
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