<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
require_once 'Model/Modele.php';

class Utilisateur extends Modele
{

  public function getUtilisateur($identifiant){
    $sql = 'SELECT identifiant, password, email FROM alk_utilisateur WHERE email = ? OR identifiant = ?';
    $utilisateur = $this->executeRequete($sql, array($identifiant, $identifiant));
    $utilisateur = $utilisateur->fetch();
    return $utilisateur;
  }
}

 ?>
