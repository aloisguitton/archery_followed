<?php
  session_start();

  $d=strtotime("-1 Months");

  $user = $_POST['pseudo'];
  $pass = $_POST['psw'];
  $userpass = md5($user . $pass);

  //BASE DE DONNEE
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=archeryfollowed;charset=utf8', 'root', '');
  }
  catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
  }

  $reponse = $bdd->query('SELECT * FROM compte');

  while ($donnees = $reponse->fetch())
  {
    if($donnees['md5'] == $userpass){
      $_SESSION['pseudo'] = $_POST['pseudo'];
      $_SESSION['deb'] = date("Y-m-d", $d);
      $_SESSION['fin'] = date("Y-m-d");
      $_SESSION['dis'] = "18";
      header("Location: ../#!/performance");
      exit();
    }
    else{
      $_SESSION['errorcon'] = 1;

    }
  }

  if($_SESSION['errorcon'] == 1){
    header("Location: ../#!/connexion");
    exit();
  }

  $reponse->closeCursor(); // Termine le traitement de la requête
?>
