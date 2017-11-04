<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
abstract class Modele
{
  private $bdd;

  // Exécute un requête SQL éventuellement paramétrée
  protected function executeRequete($requeteSql, $parametre = null)
  {
    if ($parametre === null) {
      $resultat = $this->getBdd()->query($requeteSql);
    }
    else {
      $resultat = $this->getBdd()->prepare($requeteSql);
      foreach ($parametre as $key => $value) {
        if (is_int($value)) {
          $resultat->bindParam(':'.$key, $value, PDO::PARAM_INT);
        }
      }
      $resultat->execute($parametre);
    }
    return $resultat;
  }

  // Renvoie un objet de connexion à la BDD en initialisant au besion
  private function getBdd()
  {
    if ($this->bdd == null) {
      $this->bdd = new PDO('mysql:host=localhost;dbname=blog_ecrivain;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;
  }
}

 ?>
