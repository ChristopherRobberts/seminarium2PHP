<?php

namespace TastyRecipes\Model;

class User{

    private $firstName;
    private $lastName;
    private $userName;
    private $eMail;
    private $password;

    public function __construct($firstName, $lastName, $userName, $email, $password){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->eMail = $email;
        $this->password = $password;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getEmail(){
        return $this->eMail;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function getPassWord(){
        return $this->password;
    }
}