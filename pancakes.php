<?php
  session_start();
  include 'includes/showpancakecomments.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pancake recipe</title>
  <?php
  include 'includes/head.php';
   ?>
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'includes/navbarinlog.php';
    include 'includes/body/pancakesbody.php';
  }
  else {
    include 'includes/navbaroutlog.php';
    include 'includes/body/pancakesbodyoutlog.php';
  }
  ?>
</body>
</html>
