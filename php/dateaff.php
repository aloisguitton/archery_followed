<?php
  session_start();

  $_SESSION['deb'] = date("Y-m-d",strtotime($_POST['debut']));
  $_SESSION['fin'] = date("Y-m-d",strtotime($_POST['fin']));
  $_SESSION['dis'] = $_POST['dist'];

  header("Location: ../#!/performance");
  exit();

?>
