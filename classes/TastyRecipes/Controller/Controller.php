<?php

namespace TastyRecipes\Controller;

use TastyRecipes\Integration\DBH;
use TastyRecipes\Model\Comment;
use TastyRecipes\Model\User;
use TastyRecipes\Model\UserLogIn;

class Controller {

    public function logOut() {
        session_start();
        session_unset();
        session_destroy();

    }

    public function logIn($userName, $passWord) {
        $user = new UserLogIn($userName, $passWord);
        DBH::logIn($user);
    }

    public function storeComments($number, $userName, $message) {
        $comment = new Comment($userName, $message);
        return DBH::registerComment($comment, $number);
    }

    public function getComments($num) {
        return DBH::getComments($num);
    }

    public function deleteComments($pageid, $usercommentnr) {
        DBH::deleteComment($pageid, $usercommentnr);
    }

    public function signUp($firstName, $lastName, $email, $userName, $passWord) {
        $newUser = new User($firstName, $lastName, $userName, $email, $passWord);
        DBH::signUp($newUser);
    }

    public function getNumRows($pageID){
        $numrows = DBH::countComments($pageID);
        return $numrows;
    }
}
