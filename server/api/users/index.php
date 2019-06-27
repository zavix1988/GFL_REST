<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 27.06.19
 * Time: 14:27
 */

include '../../config.php';
include '../../core/Db.php';
include '../../core/Rest.php';
include '../../core/DataConverter.php';

use core\Db;
use core\Rest;

class Users
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function getUsers($params=false)
    {

    }

    public function postUsers($params=false)
    {

    }

    public function putUsers($params=false)
    {
        if(isset($params['method'])){
            return $this->signUp($params);
        }
    }

    public function deleteUsers($params=false)
    {

    }

    private function signUp($params)
    {
        $login = $params['login'];
        $password = password_hash($params['password'], PASSWORD_DEFAULT);
        $email = $params['email'];
        $first_name = $params['first_name'];
        $last_name = $params['last_name'];
        $sql = "INSERT INTO ashop_users (login, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?)";
        if ($this->pdo->execute($sql, [$login, $password, $first_name, $last_name, $email])){
            return ['result'=>'true'];
        }
    }

    private function logIn()
    {

    }

    private function logOut()
    {

    }


}
$class = new Users();
$server = new Rest($class);