<?php
use Slim\Container;
class BaseController {
    protected $db;
    protected $cley;
    // public function __construct(Container $container) {
    //     $this->db = $container->get('db');
    //     $this->cley = "gaa pipipi";
    // }
    public function __construct(PDO $db) {
        $this->db = $db;
        $this->cley = "test view ";
    }
}
