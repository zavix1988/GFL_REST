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
include '../../core/DataViewer.php';
include '../../core/functions.php';


class Users
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }


    public function postSignUp($params)
    {

        $login = cleanPostString($params['login']);
        $password = cleanPostString($params['password']);
        $retry = cleanPostString($params['retry']);
        $email = cleanPostString($params['email']);
        $first_name = cleanPostString($params['first_name']);
        $last_name = cleanPostString($params['last_name']);

        if (check_length($password, 8, 20) && ($password == $retry) && filter_var($email, FILTER_VALIDATE_EMAIL) && check_length($login, 5, 15) )
        {
            if($this->isUnique($login))
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO ashop_users (login, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?)";
                if ($this->pdo->execute($sql, [$login, $password, $first_name, $last_name, $email])){
                    return ['result'=>true];
                }
            }
        }
        return ['result' => 'false'];
    }

    public function putLogIn($params)
    {
        $login = cleanPostString($params['login']);
        $password = cleanPostString($params['password']);

        $sql = "SELECT id, login, password FROM ashop_users WHERE login = ?";
        $result = $this->pdo->query($sql, [$login]);

        $password_hash = $result[0]['password'];
        if (password_verify($password, $password_hash)){
            $sql = "UPDATE ashop_users SET token = ? WHERE id = ?";
            $token = md5($result[0]['login'].microtime());
            if($this->pdo->execute($sql, [$token, $result[0]['id']])){
                return ['token' => $token];
            }
        }
        return ['token' => false];

    }

    public function putLogOut($params)
    {
        $token = cleanPostString($params['token']);

    }

    private function isUnique($login){
        $sql = 'SELECT login FROM ashop_users WHERE login = ?';
        $result = $this->pdo->query($sql, [$login]);
        if(count($result) > 0){
            return false;
        }
        return true;
    }

}
$class = new Users();
$server = new Rest($class);