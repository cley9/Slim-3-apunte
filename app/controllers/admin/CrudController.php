<?php
// namespace controllers\admin;
// use Psr\Log\LoggerInterface;
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// use App\DataAccess\_DataAccess;
use Slim\Http\Request;
use Slim\Http\Response;

class CrudController
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function mark(Request $request, Response $response, $args)
    // public function home($request, $response, $args)
    {
        $response->getBody()->write("¡Hola, mundo desde el controlador!");
        return $response;
        // return 23;
    }

    public function createCient(Request $request, Response $response, $args)
    {
        $newClient = $request->getParsedBody();
        $statusHead = 0;
        $bodyObj = [];
        // $dniChar=$newClient["dni"];
        if (isset($newClient) && empty($newClient)) {
            $bodyObj = [
                "status" => 301,
                "message" => "Ingrese los datos para el registro",
                // "list client" => $listClient
            ];
            $statusHead = 401;
        } else if (empty($newClient['name'])) {
            $bodyObj = [
                "status" => 401,
                "message" => "Ingrese el campo nombre",
            ];
            $statusHead = 401;
        } else if (empty($newClient["apellido"])) {
            $bodyObj = [
                "status" => 401,
                "message" => "Ingrese el campo apellido",
            ];
            $statusHead = 401;
        } else if (empty($newClient["edad"])) {
            $bodyObj = [
                "status" => 401,
                "message" => "Ingrese el campo edad",
            ];
            $statusHead = 401;
        } else if (empty($newClient["fecha_de_nacimiento"])) {
            $bodyObj = [
                "status" => 401,
                "message" => "Ingrese el campo fecha de nacimiento",
            ];
            $statusHead = 401;
        } else if (empty($newClient["dni"])) {
            $bodyObj = [
                "status" => 401,
                "message" => "Ingrese el campo dni",
            ];
            $statusHead = 401;
        } else if (strlen($newClient["dni"]) != 8) {
            $bodyObj = [
                "status" => 401,
                "message" => "El dni debe de tener exactamente 8 caracteres ",
            ];
            $statusHead = 401;
        } else {
            $consClient = $request->getParsedBody();
            $sql = "select * from client where dni=:dniClient";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':dniClient', $consClient['dni']);
            $stmt->execute();
            $updateClient = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($updateClient) > 0) {
                $bodyObj = [
                    "status" => 200,
                    "message" => "El cliente ya a sido registrado",
                    // "dni" => $dniClient
                ];
                $statusHead = 200;
            } else {
                $sql = "insert into client(name,apellido,edad,fecha_de_nacimiento,dni)values(:name,:apellido,:edad,:fechaDeNacimiento,:dni)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':name', $newClient['name']);
                $stmt->bindParam(':apellido', $newClient['apellido']);
                $stmt->bindParam(':edad', $newClient['edad']);
                $stmt->bindParam(':fechaDeNacimiento', $newClient['fecha_de_nacimiento']);
                $stmt->bindParam(':dni', $newClient['dni']);
                $stmt->execute();
                // $listClient = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($stmt->rowCount() > 0) {
                    $bodyObj = [
                        "status" => 201,
                        "message" => "Cliente registrado",
                        // "list client" => $listClient
                    ];
                    $statusHead = 200;
                } else {
                    $bodyObj = [
                        "status" => 401,
                        "message" => "No se pudo registrar el cliente, vuelva a intentarlo ",
                        // "dni" => $dniClient
                    ];
                    $statusHead = 401;
                }

            }
        }
        return $response->withJson($bodyObj, $statusHead);
    }
    public function listClient(Request $request, Response $response, $args)
    {
        $sql = "select * from client";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $listClient = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($listClient) == 0) {
            $listClient= "A un no hay clientes";
        }
        $statusHead = 200;
        $bodyObj = [
            "status" => $statusHead,
            "message" => "Lista de clientes",
            "list client" => $listClient
        ];
        return $response->withJson($bodyObj, $statusHead);
    }

    public function updateClient(Request $request, Response $response, $args)
    {
        $dniClient = $request->getAttribute('dniClient');
        $editClientNow = $request->getParsedBody();
        $statusHead = 0;
        $bodyObj = [];
        $sql = "select * from client where dni=:dniClient";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':dniClient', $dniClient);
        $stmt->execute();
        $updateClient = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($updateClient) > 0) {
            if (isset($editClientNow) && empty($editClientNow)) {
                $statusHead = 401;
                $bodyObj = [
                    "status" => $statusHead,
                    "message" => "Ingrese los datos del cliente, para la actualización",
                ];
            } else if (empty($editClientNow['name'])) {
                $statusHead = 401;
                $bodyObj = [
                    "status" => $statusHead,
                    "message" => "Ingrese el campo nombre",
                ];
            } else if (empty($editClientNow["apellido"])) {
                $statusHead = 401;
                $bodyObj = [
                    "status" => $statusHead,
                    "message" => "Ingrese el campo apellido",
                ];
            } else if (empty($editClientNow["edad"])) {
                $statusHead = 401;
                $bodyObj = [
                    "status" => $statusHead,
                    "message" => "Ingrese el campo edad",
                ];
            } else if (empty($editClientNow["fecha_de_nacimiento"])) {
                $statusHead = 401;
                $bodyObj = [
                    "status" => $statusHead,
                    "message" => "Ingrese el campo fecha de nacimiento",
                ];
            } else {
                $sql = "update client set name=:name, apellido=:apellido, edad=:edad, fecha_de_nacimiento=:fechaNacimiento  where dni=:dniClient";
                $updateStmt = $this->db->prepare($sql);
                $updateStmt->bindParam(':name', $editClientNow['name']);
                $updateStmt->bindParam(':apellido', $editClientNow['apellido']);
                $updateStmt->bindParam(':edad', $editClientNow['edad']);
                $updateStmt->bindParam(':fechaNacimiento', $editClientNow['fecha_de_nacimiento']);
                $updateStmt->bindParam(':dniClient', $dniClient);
                $updateStmt->execute();
                $statusHead = 200;
                $bodyObj = [
                    "status" => $statusHead,
                    "message" => "Cliente con dni " . $dniClient . " fue actualizado ",
                    // "dni"=> $dniClient
                ];
            }

        } else {
            $statusHead = 200;
            $bodyObj = [
                "status" => $statusHead,
                "message" => "Cliente con dni " . $dniClient . " no existe",
                // "dni" => $dniClient
            ];
        }
        return $response->withJson($bodyObj, $statusHead);
    }

    public function deleteClient(Request $request, Response $response, $args)
    {
        $dniClient = $request->getAttribute('dniClient');

        if (strlen($dniClient) != 8) {
            $statusHead = 401;
            $bodyObj = [
                "status" => $statusHead,
                "message" => "El dni debe de tener exactamente 8 caracteres ",
            ];
        } else {
            $sql = "select * from client where dni=:dniClient";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':dniClient', $dniClient);
            $stmt->execute();
            $deleteClient = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $statusHead = 0;
            $bodyObj = [];
            if (count($deleteClient) > 0) {
                $sql = "delete from client where dni=:dniClient";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':dniClient', $dniClient);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $statusHead = 201;
                    $bodyObj = [
                        "status" => $statusHead,
                        "message" => "Cliente con dni " . $dniClient . " fue eliminado ",
                        // "dni"=> $dniClient
                    ];
                } else {
                    $statusHead = 401;
                    $bodyObj = [
                        "status" => $statusHead,
                        "message" => "Cliente con dni " . $dniClient . " no se pudo eliminar ",
                        // "dni" => $dniClient
                    ];
                }
            } else {
                $statusHead = 301;
                $bodyObj = [
                    "status" => $statusHead,
                    "message" => "Cliente con dni " . $dniClient . " no existe",
                    // "dni" => $dniClient
                ];
            }
        }
        return $response->withJson($bodyObj, $statusHead);
    }

}
