<?php
  session_start();
  $date = date("Y-m-d",strtotime($_POST['date']));
  $point = $_POST['score'];
  $archer = $_SESSION['pseudo'];

  echo $date;


  try{
    $bdd = new PDO('mysql:host=localhost;dbname=archeryfollowed;charset=utf8', 'root', '');
  }
  catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
  }

  $req = $bdd->prepare('INSERT INTO `volume`(`pseudo`, `date`, `nombre`) VALUES (:pseudo, :day, :points)');
  $req->execute(array(
    'pseudo' => $archer,
    'day' => $date,
    'points' => $point
  ));

  header("Location: ../#!/performance");
  exit();
?>
