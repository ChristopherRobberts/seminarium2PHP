<!DOCTYPE html>
<html lang="en">
<head>
    <title>Swedish meatballs recipe</title>
    <?php
    include 'resources/fragments/head.php';
    ?>
</head>
<body>
<?php
if (isset($_SESSION['u_id'])) {
    include 'resources/fragments/navbarinlog.php';
    include 'resources/fragments/meatballsbody.php';
} else {
    include 'resources/fragments/navbaroutlog.php';
    include 'resources/fragments/meatballsbodyoutlog.php';
}
?>
<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src="/resources/JSfunctions/getComments.js"></script>
<script src="/resources/JSfunctions/addComments.js"></script>
<script src="/resources/JSfunctions/deleteComments.js"></script>
</body>
</html>
