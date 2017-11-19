<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food calendar</title>
  <?php
  include 'includes/head.php';
   ?>
  <link rel="stylesheet" type="text/css" href="css/calendar.css">
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'includes/navbarinlog.php';
    include 'includes/body/calendarbody.php';
  }
  else {
    include 'includes/navbaroutlog.php';
    include 'includes/body/calendarbody.php';
  }
  ?>
</body>
</html>
