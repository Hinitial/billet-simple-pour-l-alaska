<?php

$_SESSION['alert']=false;

if(isset($_POST['email']) AND isset ($_POST['password'])){

  //Sécurité
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);

  //Variable de session
  $_SESSION['alert']=true;
  $_SESSION['connexion']=false;

  //Model
  include_once('Model/connexion.php');
  $table_email = getUtilisateur($email);

  //boucle
  foreach ($table_email as $entre){
    if ($entre['email'] == $email && $entre['password'] == md5($password)){
      $_SESSION['connexion']=true;
      $_SESSION['alert']=false;
      header('Location: index.php?section=admin');
      exit();
    }
  }
}

include_once('Vue/connexion.php');
