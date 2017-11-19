<?php

  if (isset($_POST['deleteCom'])) {
    include_once '../dbh2.php';
      $usercommentnr = $_POST['user_comment_nr'];
      $sql = "DELETE FROM user_comments2 WHERE user_comment_nr='$usercommentnr'";
      $result = $conn->query($sql);
      header("Location: ../../pancakes.php");
  }
  else {
    header("Location: ../../index.php");
  }
