<?php


class Rest
{

    private $service;
    private $method;
    private $url;


    public function __construct($service)
    {
        $this->url = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], 'api'));
        $this->method = $_SERVER['REQUEST_METHOD'];
        if(is_object($service)){
            $this->service = $service;
            $this->getMethod();
        }
    }

    /**
     * @return mixed
     */
    private function getMethod()
    {
        list($api, $class, $service, $params) = explode('/', $this->url, 4);


        $format = $this->getFormat($params);

        switch($this->method)
        {
            case 'GET':
                $result = $this->setMethod('get'.ucfirst($service),  explode('/', $params));
                break;
            case 'DELETE':
                $result = $this->setMethod('delete'.ucfirst($service),  explode('/', $params));
                break;
            case 'POST':
                $params = $_POST;
                $result = $this->setMethod('post'.ucfirst($service),  explode('/', $params));
                break;
            case 'PUT':
                $params = [];
                $putdata = file_get_contents('php://input');
                $inputArray = explode('&', $putdata);
                foreach($inputArray as $pair)
                {
                    $item = explode('=', $pair);
                    if(count($item) == 2)
                    {
                        $params[urldecode($item[0])] = urldecode($item[1]);
                    }
                }
                $result = $this->setMethod('put'.ucfirst($service),  explode('/', $params));
                break;
            default:
                return false;
        }
        return DataViewer::handle($result, $format);
    }

    private function setMethod($method, $param=false)
    {
        if ( method_exists($this->service, $method) )
        {
            return call_user_func([$this->service, $method], $param);
        }
        return false;
    }

    private function getFormat($params)
    {
        if(strpos($params, TO_TEXT) !== false){
            return TO_TEXT;
        }
        if(strpos($params, TO_HTML) !== false){
            return TO_HTML;
        }
        if(strpos($params, TO_XML) !== false){
            return TO_XML;
        }
        return TO_JSON;
    }
}
