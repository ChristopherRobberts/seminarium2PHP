<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Welcome to the tasty recipes. </title>
  <?php
  include 'resources/fragments/head.php';
   ?>
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'resources/fragments/navbarinlog.php';
    include 'resources/fragments/welcomebody.php';
  }
  else {
    include 'resources/fragments/navbaroutlog.php';
    include 'resources/fragments/welcomebody.php';
  }
  ?>
</body>
</html>
