<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;
require __DIR__ ."/../BaseController.php";
// require_once __DIR__ . '/../BaseController.php';

class ViewController 
// class ViewController extends BaseController
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

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
                "message" => "Bien venido usuario administrador",
                "user"=> [
                     "name"=>$decodedToken["name"],
                     "email"=>$decodedToken["email"],
                     "rol"=>"Administrador",
                    ]
            ];
            return $response->withJson($bodyObj, 200);
        } catch (Exception $e) {
            return $response->withJson(['error' => $e->getMessage()], 500);
        }
    }
    public function save(Request $request, Response $response, $args)	{
        $sql ="select * from user";
        $sth = $this->db->prepare($sql);
        $sth->execute();
// $productos = $StatusInsert->fetchAll(PDO::FETCH_OBJ);
$productos = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $response->withJson($productos);
    }


    public function yun(Request $request, Response $response, $args)	{
        $sql ="select * from user";
        $sth = $this->db->prepare($sql);
        $sth->execute();
// $productos = $StatusInsert->fetchAll(PDO::FETCH_OBJ);
$productos = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $response->withJson($productos);
    
// return $response->withJson(["error"=> "gaaaaaaaaa"],200);
// try {
//     $sql = "select * from user";
//     $sth = $this->db->prepare($sql);
//     $sth->execute();
//     $productos = $sth->fetchAll(PDO::FETCH_ASSOC);
//     return $response->withJson($productos);
// } catch (Exception $e) {
//     return $response->withJson(['error' => $e->getMessage()], 500);
// }
}

}
