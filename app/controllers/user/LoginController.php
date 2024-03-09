<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;
class LoginController{
    public function createUser(Request $request, Response $response, $args){
        try {
            $user=$request->getParsedBody();
            $secretKey="qwertyuiopasdfghjklzxcvbnm123456";
        $usuario = [
                'name' => $user['name'],
                'email' => $user['email'],
                'rol' => 2,
              //   'password' => '1234564',
              ];
            $token = JWT::encode($usuario, $secretKey,"HS256");
            $bodyObj=[
                "status"=> 200,
                "message"=> "Usuario cliente creado",
                "token"=> $token,
                "user"=> $usuario
            ];
            return $response->withJson($bodyObj,201);
            // return $response->withJson($usuario);
        } catch (Exception $e) {
            return $response->withJson(['error' => $e->getMessage()], 500);
        }
    }
}
?>