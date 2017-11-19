<?php

session_start();

if(isset($_POST['submit'])) {

  include_once 'dbh.php';

  $uid = mysqli_real_escape_string($conn, $_POST['uname']);
  $pwd = mysqli_real_escape_string($conn, $_POST['psw']);

  //error handlers

  if (empty($uid) || empty($pwd)) {
    header("Location: ../index.php?login=error");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE user_uid='$uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {  //if number of rows in the database is less than 1, we have an error.
      header("Location: ../index.php?login=error");
      exit();
    }
    else {
      if ($row = mysqli_fetch_assoc($result)) { //taking the data from the database and assigning it to variable row
          $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);    //dehash the password so it can match the password in the database
          if ($hashedPwdCheck == false) {
            header("Location: ../index.php?login=error");
            exit();
          }
          elseif ($hashedPwdCheck == true) {
            //supergGlobal for logging in to the user.
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['u_first'] = $row['user_first'];
            $_SESSION['u_last'] = $row['user_last'];
            $_SESSION['u_email'] = $row['user_email'];
            $_SESSION['u_uid'] = $row['user_uid'];
            header("Location: ../index.php?login=success");
            exit();
          }
      }
    }
  }
}
else {
  header("Location: ../index.php?login=error");
  exit();
}
