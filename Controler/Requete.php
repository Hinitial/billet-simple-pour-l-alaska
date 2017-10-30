<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
class Requete
{
  private $parametres;

  public function __construct($parametres)
  {
    $this->parametres = $parametres;
  }

  // Vérifie l'existance d'un parametre
  public function existeParametre($nom)
  {
    return (isset($this->parametres[$nom]));
  }

  // Renvoie un parametre
  public function getParametre($nom)
  {
    if ($this->existeParametre($nom)) {
      return $this->parametres[$nom];
    }
    else {
      throw new Exception("Paramètre '$nom' absent de la requête", 1);
    }
  }
}

 ?>
