<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pancake recipe</title>
  <?php
  include 'resources/fragments/head.php';
   ?>
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'resources/fragments/navbarinlog.php';
    include 'resources/fragments/pancakesbody.php';
  }
  else {
    include 'resources/fragments/navbaroutlog.php';
    include 'resources/fragments/pancakesbodyoutlog.php';
  }
  ?>
</body>
</html>
