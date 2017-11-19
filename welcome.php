<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Welcome to the tasty recipes. </title>
  <?php
  include 'includes/head.php';
   ?>
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'includes/navbarinlog.php';
    include 'includes/body/welcomebody.php';
  }
  else {
    include 'includes/navbaroutlog.php';
    include 'includes/body/welcomebody.php';
  }
  ?>
</body>
</html>
