<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'includes/head.php';
?>
<title>Log in</title>
</head>
<body>
    <?php
        if (isset($_SESSION['u_id'])) {
          include 'includes/navbarinlog.php';
          include 'includes/containerinlogindex.php';
        }
        else {
          include 'includes/navbaroutlog.php';
          include 'includes/containeroutlogindex.php';
        }
    ?>
</body>
</html>
