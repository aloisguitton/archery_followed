<?php
  session_start();
  if(isset($_SESSION['pseudo'])){
    include("../menu/menu_coach.php");

    $user = $_SESSION['pseudo'];
    $deb = $_SESSION['deb'];
    $fin = $_SESSION['fin'];
    $dist = $_SESSION['dis'];

    $max = 720;

    if(isset($_SESSION['erroradd'])){
      if($_SESSION['erroradd'] == 1){
        echo "<script type=text/javascript>
                erroradd();
              </script>";
        $_SESSION['erroradd'] = 0;
      }
    }



    try{
      $bdd = new PDO('mysql:host=localhost;dbname=archeryfollowed;charset=utf8', 'root', '');
    }
    catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query("SELECT `point`, DAY(date) as jour, MONTH(date) as mois, YEAR(date) as annee
                            FROM `score` WHERE pseudo = '$user' AND distance = '$dist'
                            AND date >='$deb' AND date <= '$fin' ORDER BY date");

    $min = $bdd->query("SELECT MIN(`point`) as points FROM `score` WHERE pseudo = '$user'
                      AND distance = '$dist' AND date >='$deb' AND date <='$fin' ORDER BY date");

    $moy = $bdd->query("SELECT AVG(`point`) as moyenne FROM `score` WHERE pseudo = '$user'
                      AND distance =  '$dist' AND date >='$deb' AND date <='$fin' ORDER BY date");

    $reponsevol = $bdd->query("SELECT `nombre`, DAY(date) as jour, MONTH(date) as mois, YEAR(date) as annee
                            FROM `volume` WHERE pseudo = '$user' AND date >='$deb'
                            AND date <= '$fin' ORDER BY date");

    $donnees = $min->fetch();
    $min = $donnees['points'] - 100;

    if($dist == 18){
      $max = 600;
    }
    else {
      $max = 720;
    }

    echo "<script type=text/javascript>
                  graph_point($min, $dist, $max);
                  graph_volume();
                </script>";

    if($min <= 100){
      $min = 0;
    }

    $donnees = $moy->fetch();
    $moy = $donnees['moyenne'];

    while ($donneespt = $reponse->fetch())
    {
      //echo $donneespt['jour'] . "   " . $donneespt['mois'] . "   " . $donneespt['annee'] . "   " . $donneespt['point'];
      $mois = $donneespt['mois'] - 1;
      $jour = $donneespt['jour'];
      $annee = $donneespt['annee'];
      $point = $donneespt['point'];

      echo "<script type=text/javascript>
              add_to_chart($jour, $mois, $annee, $point, $moy);
            </script>";

      echo "<script type=text/javascript>
              var deb = document.getElementById('debut');
              deb.setAttribute('value', '$deb');
              var fin = document.getElementById('fin');
              fin.setAttribute('value', '$fin');
            </script>";
    }

    while ($donnees = $reponsevol->fetch())
    {
      //echo $donnees['jour'] . "   " . $donnees['mois'] . "   " . $donnees['annee'] . "   " . $donnees['point'];
      $mois = $donnees['mois'] - 1;
      $jour = $donnees['jour'];
      $annee = $donnees['annee'];
      $nombre = $donnees['nombre'];

      echo "<script type=text/javascript>
              add_to_chartvol($jour, $mois, $annee, $nombre);
            </script>";
    }


?>

<div class="content">
  <a>Page performance de <?php echo $_SESSION['pseudo']; ?></a>
  <div>
    <form action="php/add.php" method="post">
      <p>
        <label>Score</label>
        <input type="number" name="score" required/>
        <label>Date</label>
        <input type="date" name="date" required/>
        <label>Distance</label>
        <select name="distance">
          <option value="18">18</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="60">60</option>
          <option value="70">70</option>
          <option value="90">90</option>
        </select>
        <input id="add" type="submit" value="Ajouter la performance"/>
      </p>
    </form>
  </div>
  <div>
    <form action="php/dateaff.php" method="post">
      <p>
        <label>Date de début</label>
        <input type="date" name="debut" id="debut" required/>
        <label>Date de fin</label>
        <input type="date" name="fin" id="fin" required/>
        <label>Distance</label>
        <select name="dist">
          <option value="18">18</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="60">60</option>
          <option value="70">70</option>
          <option value="90">90</option>
        </select>
        <input id="add" type="submit" value="OK"/>
      </p>
    </form>
  </div>
  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
  <form action="php/add_vol.php" method="post">
    <p>
      <label>Nombre de flèches</label>
      <input type="number" name="score" required/>
      <label>Date</label>
      <input type="date" name="date" required/>
      <input id="add" type="submit" value="Ajouter"/>
    </p>
  </form>
  <div id="chartContainerVolume" style="height: 300px; width: 100%;"></div>
</div>
<?php
  }
  else {
    header("Location: #!/");
    exit();
  }
?>
