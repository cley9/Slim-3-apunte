<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;

class ClienteController
{

    public function home(Request $request, Response $response, $args)
    {
        try {
            // $tokenHead = $request->getHeaderLine('Authorization');
            $decodedToken = $request->getAttribute("token");
            // // $contentType = $request->getHeaderLine('Content-Type');
            // $token = preg_replace('/^Bearer\s/i', '', $tokenHead);
            // $secretKey = "qwertyuiopasdfghjklzxcvbnm123456";
            // $tokenHead="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoibWFyayIsImVtYWlsIjoibWFya0BnbWFpbC5jb20iLCJyb2wiOjF9.fZrjbg00b7vuxmXFr2bX6RDJuQol8U-U_xm0h3dI3fc";
            // $decoded = JWT::decode($token, $secretKey, ["HS256"]);

            $bodyObj = [
                "status" => 200,
                "message" => "Bien venido usuario Cliente",
                "user"=> [
                     "name"=>$decodedToken["name"],
                     "email"=>$decodedToken["email"],
                     "rol"=>"Cliente",
                    ]
            ];
            return $response->withJson($bodyObj, 200);
        } catch (Exception $e) {
            return $response->withJson(['error' => $e->getMessage()], 500);
        }
    }


    // class ViewController{
    public function cliente(Request $request, Response $response, $args)
    {
        $response->getBody()->write("¡Hola, mundo desde el gaa!");
        return $response;
    }

}
?>