<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food calendar</title>
  <?php
  include 'resources/fragments/head.php';
   ?>
  <link rel="stylesheet" type="text/css" href="/resources/css/calendar.css">
</head>
<body>
  <?php
  if (isset($_SESSION['u_id'])) {
    include 'resources/fragments/navbarinlog.php';
    include 'resources/fragments/calendarbody.php';
  }
  else {
    include 'resources/fragments/navbaroutlog.php';
    include 'resources/fragments/calendarbody.php';
  }
  ?>
</body>
</html>
