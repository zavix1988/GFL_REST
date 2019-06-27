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
include '../../core/DataViewer.php';

class Cars
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function getCars()
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name AS brand, ashop_cars.model FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id";

        return $this->pdo->query($sql);
    }

    public function getCar($id)
    {
        $id = $id[0];
        $sql = "SELECT ashop_cars.id, ashop_brands.name  AS brand, ashop_cars.model, ashop_cars.year, ashop_cars.displacement, ashop_cars.color, ashop_cars.max_speed, ashop_cars.price FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id WHERE ashop_cars.id = ? LIMIT 1";
        $result = $this->pdo->query($sql, [$id]);
        return $result[0];
    }

    public function getFilter()
    {
        $year = $_GET['year'];
        $brand = $_GET['brand'];
        $model = $_GET['model'];
        $color = $_GET['color'];
        $max_speed = $_GET['max_speed'];
        $minDisplacement = $_GET['minDisplacement'];
        $maxDisplacement = $_GET['maxDisplacement'];
        $minPrice = $_GET['minPrice'];
        $maxPrice = $_GET['maxPrice'];

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