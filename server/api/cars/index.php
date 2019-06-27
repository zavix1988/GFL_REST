<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 24.06.2019
 * Time: 23:51
 */

include '../../config.php';
include '../../core/Db.php';
include '../../core/Rest.php';
include '../../core/DataConverter.php';

use core\Db;
use core\Rest;

class Cars
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function getCars($params=false)
    {
        if(isset($params['id'])){
            $id = (int)$params['id'];
            return $this->getCarById($id);
        }
        else if(isset($params['filter'])){
            return $this->getCarsByParam(2008, 'Skoda');
        }
        return $this->getAllCars();
    }

    public function postCars($params=false)
    {
    }

    public function putCars($params=false)
    {
    }

    public function deleteCars($params=false)
    {

    }


    private function getAllCars()
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name AS brand, ashop_cars.model FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id";

        return $this->pdo->query($sql);
    }

    private function getCarById($id)
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name  AS brand, ashop_cars.model, ashop_cars.year, ashop_cars.displacement, ashop_cars.color, ashop_cars.max_speed, ashop_cars.price FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id WHERE ashop_cars.id = ? LIMIT 1";
        $result = $this->pdo->query($sql, [$id]);
        return $result[0];
    }

    private function getCarsByParam($year, $brand=false, $model=false, $color=false, $max_speed=false, $minDisplacement=false, $maxDisplacement=false, $minPrice=false, $maxPrice=false)
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name  AS brand, ashop_cars.model FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id WHERE ashop_cars.year = ? ";
        $params[] = $year;

        if ($brand){
            $sql .= "AND ashop_brands.name = ? ";
            $params[] = $brand;
        }
        if ($model){
            $sql .= "AND ashop_cars.model = ? ";
            $params[] = $model;
        }
        if ($color){
            $sql .= "AND ashop_cars.color = ? ";
            $params[] = $color;
        }
        if ($max_speed) {
            $sql .= "AND ashop_cars.max_speed <= ? ";
            $params[] = $max_speed;
        }
        if ($minDisplacement){
            $sql .= "AND ashop_cars.displacement >= ? ";
            $params[] = $minDisplacement;
        }
        if ($maxDisplacement){
            $sql .= "AND ashop_cars.displacement <= ? ";
            $params[] = $maxDisplacement;
        }
        if ($minPrice){
            $sql .= "AND ashop_cars.price >= ? ";
            $params[] = $minPrice;
        }
        if ($maxPrice){
            $sql .= "AND ashop_cars.price <= ? ";
            $params[] = $maxPrice;
        }
        return $this->pdo->query($sql, $params);
    }
}

$carService = new Cars();
$server = new Rest($carService);