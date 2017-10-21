<?php
//appelle BDD

function insertBDD($titre, $post, $publication, $date_post){

  global $bdd;

  $tab = array(
      'titre' => $titre,
      'post' => $post,
      'publication' => $publication,
      'date_post' => $date_post);

  $requete = $bdd->prepare('INSERT INTO alk_episode(titre, post, publication, date_post, date_modification) VALUES(:titre, :post, :publication, :date_post, NOW() )') or die(print_r($bdd->errorInfo()));
  $requete->execute($tab);
}

function updateBDD($id, $titre, $post, $publication, $date_post){

  global $bdd;

  $tab = array(
      'id' => $id,
      'titre' => $titre,
      'post' => $post,
      'publication' => $publication,
      'date_post' => $date_post);

  $requete = $bdd->prepare('UPDATE alk_episode SET titre = :titre, post = :post, publication = :publication, date_post = :date_post, date_modification = NOW() WHERE id_episode = :id') or die(print_r($bdd->errorInfo()));
  $requete->execute($tab);
}

function deleteBDD($id){

  global $bdd;

  $tab = array(
      'id' => $id);

  $requete = $bdd->prepare('DELETE FROM alk_episode WHERE id_episode = :id') or die(print_r($bdd->errorInfo()));
  $requete->execute($tab);
}
