<?php
  session_start();
  if(isset($_SESSION['pseudo'])){
    include("../menu/menu_coach.php");
  }
  else {
    include("../menu/menu_noid.php");
  }
  $_SESSION['errorcon'] = 0;
?>
<div class="content">
  <a>Page principale</a>
</div>
