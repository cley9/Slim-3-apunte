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
            // $decoded = JWT::decode($token, $secretKey, ["HS256"]);
            $statusHead=200;
            $bodyObj = [
                "status" => $statusHead,
                "message" => "Bienvenido usuario administrador",
                "user"=> [
                     "name"=>$decodedToken["name"],
                     "email"=>$decodedToken["email"],
                     "rol"=>"Administrador",
                    ]
            ];
            return $response->withJson($bodyObj, $statusHead);
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
$productos = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $response->withJson($productos);
}

}
