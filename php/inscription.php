<?php

  session_start();

  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['psw']);
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $email = htmlspecialchars($_POST['email']);
  $ville = htmlspecialchars($_POST['club']);
  $pays = htmlspecialchars($_POST['pays']);
  $userpass = $pseudo . $password;
  $prenomnom = $prenom . $nom;
  $mail = $email . $pseudo;
  $md5 = md5($userpass);
  $md5mail = md5("$mail");

  $d=strtotime("-1 Months");
  $_SESSION['deb'] = date("Y-m-d", $d);
  $_SESSION['fin'] = date("Y-m-d");
  $_SESSION['dis'] = "18";

  $exist = 0;

  try{
    $bddr = new PDO('mysql:host=localhost;dbname=archeryfollowed;charset=utf8', 'root', '');
  }
  catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
  }

  $reponse = $bddr->query('SELECT * FROM compte');

  while ($donnees = $reponse->fetch())
  {
    if($donnees['pseudo'] == $pseudo){
      $exist = 1;
    }
  }

  if($exist == 0){
    try{
      $bdd = new PDO('mysql:host=localhost;dbname=archeryfollowed;charset=utf8', 'root', '');
    }
    catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
    }

    try{
      $req = $bdd->prepare('INSERT INTO compte (pseudo, md5, nom, prenom, prenomnom, mail, ville, pays, verifemail,
        mdpoublie) VALUES(:pseudo, :md5, :nom, :prenom, :prenomnom, :mail, :ville, :pays, :verifemail, :mdpoublie)');
      $req->execute(array(
        'pseudo' => $pseudo,
        'md5' => $md5,
        'nom' => $nom,
        'prenom' => $prenom,
        'prenomnom' => $prenomnom,
        'mail' => $email,
        'ville' => $ville,
        'pays' => $pays,
        'verifemail' => $md5mail,
        'mdpoublie' => ""
      ));

      $_SESSION['pseudo'] = $pseudo;
      $_SESSION['exist'] = false;
      header("Location: ../#!/performance");
      exit();
    }
    catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
    }

  }
  else {
    $_SESSION['exist'] = true;
    header("Location: ../#!/inscription");
    exit();
  }


?>
