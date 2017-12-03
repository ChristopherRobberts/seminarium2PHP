<?php

namespace TastyRecipes\Model;

class Comment {
    private $username;
    private $comment;

    public function __construct($usern, $comm) {
        $this->username = $usern;
        $this->comment = $comm;
    }

    public function getUserName() {
        return $this->username;
    }

    public function getComment() {
        return $this->comment;
    }
}