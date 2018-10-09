<?php
  $request =file_get_contents('php://input');
  if(!(isset($_COOKIE['pseudorech']))){
    setcookie('pseudorech', "$request", time() + 10);
  }
?>
