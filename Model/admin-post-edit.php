<?php
function getEpisode(){

  global $bdd;

  $requete = $bdd->prepare('SELECT id_episode, titre, post, publication, date_post FROM alk_episode WHERE id_episode = :id_rechercher');
  $requete->execute(array('id_rechercher' => $_GET['id']));

  return $requete;
}
