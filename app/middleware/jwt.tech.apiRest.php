<?php
use Slim\App;
use Tuupola\Middleware\JwtAuthentication;

return function (App $app) {
    $app->add(new JwtAuthentication([
        "path" => "/api", /* or ["/api", "/admin"] */
        "secret" => "qwertyuiopasdfghjklzxcvbnm123456",
        // "algorithm" => ["HS256", "HS384"]
        // "after" => function ($response, $arguments) {
        //     return $response->withHeader("X-Brawndo", "plants crave");
        // }
        "error" => function ($response, $arguments) {
            $data["status"] = "error";
            $data["message"] = $arguments["message"];
            $response->getBody()->write(
                json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            );
            return $response->withHeader("Content-Type", "application/json");
        }
    ]));
};

?>