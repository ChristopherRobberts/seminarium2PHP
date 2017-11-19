<?php
  session_start();
  include 'includes/showcommentsmeatballs.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Swedish meatballs recipe.</title>
  <?php
  include 'includes/head.php'
  ?>
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'includes/navbarinlog.php';
    include 'includes/body/meatballsbody.php';
  }
  else {
    include 'includes/navbaroutlog.php';
    include 'includes/body/meatballsbodyoutlog.php';
  }
  ?>
  </div>
</body>
</html>
