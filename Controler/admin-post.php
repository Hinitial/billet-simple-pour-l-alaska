<?php
if($_SESSION['connexion'] == true){
  include_once('Model/admin-post.php');
  $liste = getEpisode();

  include_once('Vue/admin-post.php');
}
else {
  header('Location: index.php?section=connexion');
}
