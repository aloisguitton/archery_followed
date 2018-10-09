<?php
  session_start();
  if(isset($_SESSION['pseudo'])){
    include("../menu/menu_coach.php");

    try{
      $bdd = new PDO('mysql:host=localhost;dbname=archeryfollowed;charset=utf8', 'root', '');
    }
    catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
    }

    if(isset($_SESSION['recherche'])){
      $rech = $_SESSION['recherche'];
      if($rech != ""){
        $rech = str_replace(' ', '', $rech);
        $reponse = $bdd->query("SELECT pseudo, nom, prenom, ville, pays FROM `compte` WHERE `prenomnom` LIKE '%$rech%'");
      }
      else {
        $reponse = $bdd->query("SELECT pseudo, nom, prenom, ville, pays FROM `compte`");
      }
    }
    else {
      $reponse = $bdd->query("SELECT pseudo, nom, prenom, ville, pays FROM `compte`");
    }

?>

<div class="content">
  <center>
    <h1>RECHERCHE</h1>
    <?php
      while ($donnees = $reponse->fetch()) {
        echo '<div>
          <a href="#!/perf/' . $donnees['pseudo'] .'">' . $donnees['nom'] . " " . $donnees['nom'] ."</a>
          </br>
          <a>" . $donnees['ville'] . ", " . $donnees['pays'] . "</a>
        </div>";
      }
    ?>
  </center>
</div>

<?php
  }
  else {
    header("Location: #!/");
    exit();
  }
?>
