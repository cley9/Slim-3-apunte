<?php
// namespace Hola;
use Slim\Http\Request;
use Slim\Http\Response;

class Data{
    public function skyle(Request $request, Response $response, $args){
        $response->getBody()->write("¡Hola, mundo desde el controlador!");
        return $response;
    }
        // public function skyle(){
        //     return "hola ";
        // }
}
?>