<!DOCTYPE html>
<html lang="en">
<head>
  <title>Swedish meatballs recipe</title>
  <?php
  include 'resources/fragments/head.php'
  ?>
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'resources/fragments/navbarinlog.php';
    include 'resources/fragments/meatballsbody.php';
  }
  else {
    include 'resources/fragments/navbaroutlog.php';
    include 'resources/fragments/meatballsbodyoutlog.php';
  }
  ?>
</body>
</html>
