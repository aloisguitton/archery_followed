<?php
  session_start();
  $_SESSION['errorcon'] = 0;
  $_SESSION['exist'] = false;  
  header("Location: ../#!/connexion");
  exit();
?>
