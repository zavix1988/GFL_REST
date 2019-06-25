<?php
class RestServer
{

    private $service;
    private $url;
    private $method;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        list($s, $a, $d, $db, $table, $path) = explode('/', $this->url, 6);
        echo $table;
    }
}
