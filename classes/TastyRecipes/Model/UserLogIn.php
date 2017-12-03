<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 2017-12-02
 * Time: 17:53
 */

namespace TastyRecipes\Model;


class UserLogIn {

    private $userName;
    private $password;

    public function __construct($username, $password) {
        $this->userName = $username;
        $this->password = $password;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function getPassword(){
        return $this->password;
    }
}