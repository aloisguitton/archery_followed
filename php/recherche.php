<?php
  session_start();
  if(isset($_POST['recherche'])){
    $_SESSION['recherche'] = $_POST['recherche'];
  }
  header("Location: ../#!/recherche");
  exit();
?>
