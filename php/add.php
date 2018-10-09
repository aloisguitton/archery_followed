<?php
  session_start();
  $date = date("Y-m-d",strtotime($_POST['date']));
  $point = $_POST['score'];
  $archer = $_SESSION['pseudo'];
  $distance = $_POST['distance'];

  if($point >=0){
    if(($distance == "18" and $point <=600) or ($distance != "18" and $point <=720)){
      try{
        $bdd = new PDO('mysql:host=localhost;dbname=archeryfollowed;charset=utf8', 'root', '');
      }
      catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
      }

      $req = $bdd->prepare('INSERT INTO `score` (`pseudo`, `distance`, `date`, `point`)
            VALUES(:pseudo, :distance, :day, :points)');

      $req->execute(array(
        'pseudo' => $archer,
        'distance' => $distance,
        'day' => $date,
        'points' => $point
      ));

      $_SESSION['erroradd'] = 0;

      header("Location: ../#!/performance");
      exit();
    }
    else {
      $_SESSION['erroradd'] = 0;
      header("Location: ../#!/performance");
      exit();
    }
  }

  else {
    $_SESSION['erroradd'] = 1;
    header("Location: ../#!/performance");
    exit();
  }

?>
