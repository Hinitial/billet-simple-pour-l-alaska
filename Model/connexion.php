<?php
function getUtilisateur($email_envoye){

  global $bdd;

  $requete = $bdd->prepare('SELECT identifiant, password, email FROM alk_utilisateur WHERE email = ?');
  $requete->execute(array($email_envoye));

  $table_email = $requete->fetchAll();

  return $table_email;
}
