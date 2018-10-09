<?php
session_start();
include("../menu/menu_co.php");
if(isset($_SESSION['pseudo'])){
  header("Location: performance");
  exit();
}
if(isset($_SESSION['errorcon'])){
  if ($_SESSION['errorcon'] == 1) {
    echo "<script type=text/javascript>
              nopass();
            </script>";
  }
}

?>
<div class="content">
  <center>
    <a id="iderror">Identifiants incorrects</a>
    <form method="post" action="php/connexion.php">
      <p>
        <label>Identifiant</label>
        </br>
        <input type="text" name="pseudo" required/>
      </p>
      <p>
        <label>Mot de passe</label>
        </br>
        <input type="password" name="psw" required/>
      </p>
      <input id="login" type="submit" value="Connexion"/>
    </form>
    <div id="signup">
      <a href="#!/inscription">Créer un compte</a>
    </div>
  </center>
</div>
