<?php

namespace core;

class Rest
{

    private $service;
    private $method;
    private $url;


    public function __construct($service)
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        if(is_object($service)){
            $this->service = $service;
            echo $this->getMethod();
        }
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        list($root, $source, $folder1, $folder2, $service, $params) = explode('/', $this->url, 6); //Server, api, cars, params


        switch($this->method)
        {
            case 'GET':
                $result = $this->setMethod('get'.ucfirst($service), explode('/', $params));
                break;
            case 'DELETE':
                $result = $this->setMethod('delete'.ucfirst($service), explode('/', $params));
                break;
            case 'POST':
                $result = $this->setMethod('post'.ucfirst($service), explode('/', $params));
                break;
            case 'PUT':
                $result = $this->setMethod('put'.ucfirst($service), explode('/', $params));
                break;
            default:
                return false;
        }
        return json_encode($result);
    }

    function setMethod($method, $param=false)
    {
        if ( method_exists($this->service, $method) )
        {
            return call_user_func([$this->service, $method], $param);
        }
        return false;
    }
}
