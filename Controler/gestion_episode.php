<?php
if($_SESSION['connexion'] == true){

  include_once('Model/gestion_episode.php');

  //Valeur publication et date_post?
  $publication;
  $date_post;

  if (isset($_POST['publier'])) {
    $publication = 1;
    $date = new DateTime($_POST['date_post']);
    $date_post = $date->format('Y-m-d H:i:s');
  }
  elseif (isset($_POST['brouillon'])) {
    $publication = 0;
    $date_post = '0000-00-00 00:00:00';
  }

  if($_GET['db'] === 'insert'){
    insertBDD($_POST['titre'], $_POST['post'], $publication, $date_post);
  }
  elseif (isset($_POST['supprimer'])) {
    deleteBDD($_GET['id']);
  }
  elseif ($_GET['db'] === 'update') {
    updateBDD($_GET['id'], $_POST['titre'], $_POST['post'], $publication, $date_post);
  }

  header('Location: index.php?section=admin-post');
}
else {
  header('Location: index.php?section=connexion');
}
