<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 01.07.19
 * Time: 12:41
 */

include '../../config.php';
include '../../core/Db.php';
include '../../core/Rest.php';
include '../../core/DataViewer.php';
include '../../core/functions.php';

class Orders
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function getAllOrders($params)
    {
        if($params[0] = 'token') {
            $token = $params[1];
            $userId = $this->getUserID($token);
            if ($userId) {
                $sql = 'SELECT ashop_brands.name, ashop_cars.model, ashop_rorders.time 
                      FROM ashop_cars 
                      INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id 
                      INNER JOIN ashop_rorders ON ashop_cars.id=ashop_rorders.car_id 
                      WHERE ashop_rorders.user_id = ?';
                return $this->pdo->query($sql, [$userId]);

            }
        }
        return ['user' => 'unauthorized'];


    }

    public function putBuyCar($params)
    {
        $token = $params['token'];
        $userId = $this->getUserID($token);
        if($userId)
        {
            $sql = 'INSERT INTO ashop_rorders (user_id, car_id, time) VALUES (?, ?, ?)';
            if($this->pdo->execute($sql, [$userId, $params['id'], time()])){
                return ['result' => true];
            }
            return ['result' => false];
        }
        return ['user' => 'unauthorized'];
    }

    private function getUserID($token){
        $sql = 'SELECT id FROM ashop_users WHERE token = ? LIMIT 1';
        $result = $this->pdo->query($sql, [$token]);
        if(!empty($result[0]['id']))
        {
            return $result[0]['id'];
        }
        return false;
    }

}

$orderService = new Orders();
$server = new Rest($orderService);