<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 27.06.19
 * Time: 9:38
 */

namespace core;


class DataConverter
{
    public static function handle($data, $format=false)
    {
        switch ($format)
        {
            case TO_TEXT :
                header('Content-type: text/plain');
                echo self::toText($data);
                break;
            case TO_XML :
                header('Content-type: application/xml');
                echo self::toXML($data);
                break;
            case TO_HTML :
                header('Content-type: text/html');
                echo self::toHTML($data);
                break;
            default:
                header('Content-Type: application/json');
                echo self::toJson($data);
        }
    }

    private function toText($data)
    {
        $string = '';

        foreach($data as $key => $node){
            if(is_array($node)){
                foreach($node as $key => $value){
                    $string .= "{$key}: {$value}\n";
                }
            }else if(is_string($node)){
                $string .= "{$key}: {$node}\n";
            }
        }
        return $string;
    }

    private function toJson($data)
    {
        return json_encode($data);
    }

    private function toXML($data)
    {
        $xml = new \SimpleXMLElement('<data/>');

        if (is_array($data))
        {
            foreach ($data as $data_key => $item)
            {
                if (is_array($item))
                {
                    $car = $xml->addChild('node');
                    foreach ($item as $key => $val)
                    {
                        $car->addChild($key, $val);
                    }
                }
                if(is_string($item))
                {
                    $xml->addChild($data_key, $item);
                }
            }
            $result = $xml->asXML();
            return $result;
        }

    }

    private function toHTML($data)
    {
        if(is_array($data)){
            $string = "<div class='data'>\n";
            foreach($data as $key => $node){
                if (is_array($node)){
                    $string .= "<div class='node'>\n";
                    foreach($node as $key => $value){
                        $string .= "<div class='{$key}'>$value</div>\n";
                    }
                    $string .= "</div>\n";
                }else if(is_string($node)){
                    $string .= "<div class='{$key}'>$node</div>\n";
                }

            }
            $string .= "</div>\n";
            return $string;
        }
        return false;

    }
}