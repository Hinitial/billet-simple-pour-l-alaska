<?php
namespace BlogEcrivain\Controler;
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

  // Redirige vers une page
  public function redirection($argument)
  {
    $chaine = '';
    if (is_array($argument)) {
      $i = 0;
      foreach ($argument as $key => $value) {
        $chaine = $chaine . $key . '=' . $value;
        if ((strlen($argument)-1) !== $i) {
          $chaine = $chaine . '&';
        }
        $i = $i + 1;
      }
      $chaine = 'index.php?' . $chaine;
    }
    else {
      $chaine = $argument;
    }
    header('Location: ' . $chaine);
    exit;
  }
}

 ?>
