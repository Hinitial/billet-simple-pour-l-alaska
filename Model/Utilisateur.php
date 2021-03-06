<?php
namespace BlogEcrivain\Model;
use \BlogEcrivain\Controler\Requete;
/**
 *
 */

class Utilisateur extends Modele
{

  // Renvoie l'utilisateur demendé
  public function getUtilisateur($identifiant){
    $sql = 'SELECT identifiant, password, email FROM alk_utilisateur WHERE email = ? OR identifiant = ?';
    $utilisateur = $this->executeRequete($sql, array($identifiant, $identifiant));
    $utilisateur = $utilisateur->fetch();
    return $utilisateur;
  }

  // Vérifié si le couple identifiant/mot de passe est correcte
  public function verifierUtilisateur(Requete $requete)
  {
    $identifiant = $requete->getParametre('email');
    $password = $requete->getParametre('password');

    //Sécurité
    $identifiant = strip_tags($identifiant);
    $password = strip_tags($password);

    $utilisateur = $this->getUtilisateur($identifiant);

    return password_verify($password, $utilisateur['password']);
  }
}

 ?>
