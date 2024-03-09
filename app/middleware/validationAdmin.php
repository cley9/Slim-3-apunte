<?php
use Slim\Http\Request;
use Slim\Http\Response;

class validationAdmin
{
    public function __invoke($request, $response, $next)
    {
        try {
            $decodedToken = $request->getAttribute("token");
            if (isset($decodedToken['rol']) && $decodedToken['rol'] == 4) {
                $response = $next($request, $response);
                return $response;
            } else {
                $data["status"] = "error";
                $data["message"] = "No estás autorizado para acceder a esta ruta";
                $response->getBody()->write(
                    json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
                );
                return $response->withHeader("Content-Type", "application/json")->withStatus(403);
            }
        } catch (Exception $e) {
            return $response->withJson(['error fda' => $e->getMessage()], 500);
        }
    }
}
?>