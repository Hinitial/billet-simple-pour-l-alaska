<?php
if($_SESSION['connexion'] == true && isset($_GET['id'])){
  if ($_GET['id'] !== 'new') {
    include_once('Model/admin-post-edit.php');
    $liste = getEpisode();
    $donnee = $liste->fetch();
  }


  include_once('Vue/admin-post-edit.php');
}
else {
  header('Location: index.php?section=connexion');
}
