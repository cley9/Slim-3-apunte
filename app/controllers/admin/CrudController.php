<?php
// namespace controllers\admin;
// use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
// use App\DataAccess\_DataAccess;

class CrudController{
    public function mark(Request $request, Response $response, $args)
    // public function home($request, $response, $args)
    {
        $response->getBody()->write("¡Hola, mundo desde el controlador!");
        return $response;
        // return 23;
    }
}
