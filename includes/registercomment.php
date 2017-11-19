<?php
session_start();

if(isset($_SESSION['u_id'])) {

    include_once 'dbh2.php';

    $comment = mysqli_real_escape_string($conn, $_POST['txtarea']);
    $userid = mysqli_real_escape_string($conn, $_SESSION['u_uid']);

    if (empty($comment)) {
      header("Location: ../meatballs.php?comment=error");
      exit();
    }
    else {
      $sql = "INSERT INTO user_comments(user_message, user_idd) VALUES ('$comment', '$userid');";
      mysqli_query($conn, $sql);
      header("Location: ../meatballs.php?comment=success");
      exit();
    }
}
else {
  header("Location: ../index.php?signup=log_in_required");
  exit();
}
