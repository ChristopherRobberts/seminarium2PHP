<?php
session_start();

if (isset($_POST['submit'])) {  //only loads next page if you clicked the submit button, stops people from typing in file name in URL.

  include_once 'dbh.php';

  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $psw = mysqli_real_escape_string($conn, $_POST['psw']);    //this function makes that any code written in the form boxes turns into plain text.

  //Check for empty firlds
  if (empty($fname) || empty($lname) || empty($email) || empty($uname) || empty($psw)) {
    header("Location: ../signuppage.php?signup=empty");
    exit();
  }
  else {
    //Check if input characters are valid
    if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
      header("Location: ../signuppage.php?signup=invalid");
      exit();
    }
    else {
      //Check if email is valid
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signuppage.php?signup=email");
        exit();
      }
      else {
        //Check if there already is a connection to that user name in the database
        $sql = "SELECT * FROM users WHERE user_uid='$uname'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
          header("Location: ../signuppage.php?signup=usertaken");
          exit();
        }
        else {
          //hashing the password
          $hashedPwd = password_hash($psw, PASSWORD_DEFAULT);
          //insert the user into the database
          $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$fname', '$lname', '$email', '$uname', '$hashedPwd');";
          mysqli_query($conn, $sql);
          header("Location: ../index.php?signup=success");
          exit();
        }
      }
    }
  }
}
else {
  header("Location: ../signuppage.php");  //else we redirect client to the same page.
  exit(); //closes the script.
}
