<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;
class LoginController{
    public function createAdmin(Request $request, Response $response, $args){
        try {
            // $newAdmin = $request->getParsedBody();
            // $statusHead = 0;
            // $bodyObj = [];
            // return $response->withJson($newAdmin);
            $user=$request->getParsedBody();
            $secretKey="qwertyuiopasdfghjklzxcvbnm123456";
        $usuario = [
                'name' => $user['name'],
                'email' => $user['email'],
                'rol' => 4,
              ];
            $token = JWT::encode($usuario, $secretKey,"HS256");
            $statusHead=201;
            $bodyObj=[
                "status"=> $statusHead,
                "message"=> "Usuario admin creado",
                "token"=> $token,
                "user"=> $usuario
            ];
            return $response->withJson($bodyObj,$statusHead);
            // return $response->withJson($usuario);
        } catch (Exception $e) {
            return $response->withJson(['error' => $e->getMessage()], 500);
        }
    }
}
?>