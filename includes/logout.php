<?php

  if (isset($_POST['outlog'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
  }
