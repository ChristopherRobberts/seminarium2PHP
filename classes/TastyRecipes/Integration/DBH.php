<?php

namespace TastyRecipes\Integration;

use TastyRecipes\Model\Comment;
use TastyRecipes\Model\User;
use TastyRecipes\Model\UserLogIn;
use TastyRecipes\Util\Util;

class DBH {

    public static function logIn(UserLogIn $user) {
        $connection = self::connect(1);

        $username = mysqli_real_escape_string($connection, $user->getUserName());
        $password = mysqli_real_escape_string($connection, $user->getPassword());

        if (empty($username) || empty($password)) {
            throw new \Exception("Empty");
        }
        $sql = "SELECT * FROM users WHERE user_uid='$username'";
        $result = mysqli_query($connection, $sql);
        $userNotFound = mysqli_num_rows($result) < 1;

        if ($userNotFound) {  //if number of rows in the database is less than 1, we have an error.
            throw new \Exception("no such username");
        }
        //taking the data from the database and assigning it to variable row
        $row = mysqli_fetch_assoc($result);
        //dehash the password so it can match the password in the database
        $hashedPwdCheck = password_verify($password, $row['user_pwd']);
        if (!$hashedPwdCheck) {
            throw new \Exception("Wrong password");
        }

        $_SESSION['u_id'] = $row['user_id'];
        $_SESSION['u_uid'] = $row['user_uid'];
    }


    public static function connect($dataBase) {
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "password";

        if ($dataBase == 1) {
            $dbName = "loginsystem";
        } else if ($dataBase == 2) {
            $dbName = "comment section";
        } else
            $dbName = null;

        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
        return $conn;
    }

    public static function registerComment(Comment $comment, $pageNumber) {
        $connection = self::connect(2);

        $theComment = mysqli_real_escape_string($connection, $comment->getComment());
        $userid = mysqli_real_escape_string($connection, $comment->getUserName());
        $sql = "";

        if ($pageNumber == 1) {
            if (empty($comment)) {
                throw new \Exception("Empty");
            }
            $sql = "INSERT INTO user_comments(user_message, user_idd) VALUES ('$theComment', '$userid');";
        }
        if ($pageNumber == 2) {
            if (empty($comment)) {
                throw new \Exception("Empty");
            }
            $sql = "INSERT INTO user_comments2(user_message, user_idd) VALUES ('$theComment', '$userid');";
        }
        if (mysqli_query($connection, $sql) === TRUE) {
            $last_id = $connection->insert_id;
            return [
                'id' => $last_id,
                'username' => $comment->getUserName(),
                'text' => $comment->getComment()
            ];
        } else {
            return null;
        }
    }

    public static function getComments($pageid) {
        $connection = self::connect(2);
        $arr = array();
        if ($pageid == 1) {
            $sql = "SELECT * FROM user_comments";
            $result = $connection->query($sql);
            while ($row = $result->fetch_assoc()) {
                $commentNr = $row['user_comment_nr'];
                $comment = $row['user_message'];
                $userName = $row['user_idd'];
                $comment = [
                    'id' => $commentNr,
                    'text' => $comment,
                    'username' => $userName
                ];
                array_push($arr, $comment);
            }
        }
        if ($pageid == 2) {
            $sql = "SELECT * FROM user_comments2";
            $result = $connection->query($sql);
            while ($row = $result->fetch_assoc()) {
                $commentNr = $row['user_comment_nr'];
                $comment = $row['user_message'];
                $userName = $row['user_idd'];
                $comment = [
                    'id' => $commentNr,
                    'text' => $comment,
                    'username' => $userName
                ];
                array_push($arr, $comment);
            }
        }
        return $arr;
    }

    public static function deleteComment($pageid, $usercommentnr) {
        $connection = self::connect(2);
        if ($pageid == 1) {
            $sql = "DELETE FROM user_comments WHERE user_comment_nr='$usercommentnr'";
            $connection->query($sql);
        }
        if ($pageid == 2) {
            $sql = "DELETE FROM user_comments2 WHERE user_comment_nr='$usercommentnr'";
            $connection->query($sql);
        }
    }

    public static function signUp(User $user) {
        $connection = self::connect(1);

        $fname = mysqli_real_escape_string($connection, $user->getFirstName());
        $lname = mysqli_real_escape_string($connection, $user->getLastName());
        $email = mysqli_real_escape_string($connection, $user->getEmail());
        $uname = mysqli_real_escape_string($connection, $user->getUserName());
        $psw = mysqli_real_escape_string($connection, $user->getPassWord());    //this function makes that any code written in the form boxes turns into plain text.
        //Check for empty fields
        if (empty($fname) || empty($lname) || empty($email) || empty($uname) || empty($psw)) {
            throw new \Exception("Empty");
        }
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
            throw new \Exception("wrong characters");
        }
        //Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Please enter a valid email address");
        }
        //Check if there already is a connection to that user name in the database
        $sql = "SELECT * FROM users WHERE user_uid='$uname'";
        $result = mysqli_query($connection, $sql);
        $userTaken = mysqli_num_rows($result) > 0;

        if ($userTaken) {
            throw new \Exception("username already taken");
        }
        //hashing the password
        $hashedPwd = password_hash($psw, PASSWORD_DEFAULT);
        //insert the user into the database
        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?, ?, ?, ?, ?);";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssss", $fname, $lname, $email, $uname, $hashedPwd); //bind variables '$fname', '$lname', '$email', '$uname', '$hashedPwd'
        $stmt->execute(); //execute the prepared statement
    }

    public static function countComments($pageID) {
        $connection = self::connect(2);
        if ($pageID == 1) {
            $result = mysqli_query($connection, "SELECT * FROM user_comments");
            $rows = mysqli_num_rows($result);
        } else if ($pageID == 2) {
            $result = mysqli_query($connection, "SELECT * FROM user_comments2");
            $rows = mysqli_num_rows($result);
        }
        return $rows;
    }
}