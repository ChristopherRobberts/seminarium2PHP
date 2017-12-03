<?php

namespace TastyRecipes\Controller;

use TastyRecipes\Integration\DBH;
use TastyRecipes\Model\Comment;
use TastyRecipes\Model\User;
use TastyRecipes\Model\UserLogIn;
use TastyRecipes\Util\Util;

class Controller {

    public function logOut() {
        if (isset($_POST['outlog'])) {
            session_start();
            session_unset();
            session_destroy();
        }
    }

    public function logIn() {
        $username = htmlspecialchars($_POST['uname'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['psw'], ENT_QUOTES, 'UTF-8');
        $user = new UserLogIn($username, $password);
        DBH::logIn($user);
    }

    public function storeComments($number){
        $username = $_SESSION['u_uid'];
        $message = htmlspecialchars($_POST['txtarea'], ENT_QUOTES, 'UTF-8');
        $comment = new Comment($username, $message);
        DBH::registerComment($comment, $number);
    }

    public function getComments($num){
        DBH::getComments($num);
    }

    public function deleteComments($pageid){
        DBH::deleteComment($pageid);
    }

    public function signUp(){
        $firstName = htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8');
        $lastName = htmlspecialchars($_POST['lname'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $userName = htmlspecialchars($_POST['uname'], ENT_QUOTES, 'UTF-8');
        $passWord = htmlspecialchars($_POST['psw'], ENT_QUOTES, 'UTF-8');
        $newUser = new User($firstName, $lastName, $userName, $email, $passWord);
        DBH::signUp($newUser);
    }
}
