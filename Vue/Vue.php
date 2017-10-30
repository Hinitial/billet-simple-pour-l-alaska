<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
class Vue
{
  private $affichage;
  private $fichier;
  private $titre;

  public function __construct($affichage, $action, $controleur = "") {
   // Détermination du nom du fichier vue à partir de l'action et du constructeur
    $fichier = "Vue/";
    if ($controleur != "") {
      $fichier = $fichier . $controleur . "/";
    }
    $this->fichier = $fichier . $action . ".php";

    $this->affichage = $affichage;
  }

  public function afficher($donnee)
  {
    //Génération des élements nécésitant une BDD
    $contenue = $this->generer($this->fichier, $donnee);
    //Génération de la page, en fonction du gabarit
    if ($this->affichage === 'front') {
      $vue = $this->generer('Vue/gabarit-front.php', array('corp' => $contenue, 'titre' => $this->titre));
    } elseif ($this->affichage === 'back') {
      $vue = $this->generer('Vue/gabarit-back.php', array('corp' => $contenue, 'titre' => $this->titre));
    } else {
      throw new Exception("Error : Variable " . $this->affichage . " incorrect", 1);
    }
    //Affichage
    echo $vue;
  }

  private function generer($fichier, $donnees)
  {
    if (file_exists($fichier)) {
      //Charge l'ensemble des données et les rends accesible
      extract($donnees);
      //Démarage tampon
      ob_start();
      //Inclure la vue
      require $fichier;
      //Arrêt et envoie du tampon
      return ob_get_clean();
    }
    else {
      throw new Exception('Fichier '. $fichier . ' introuvable');
    }
  }
}


?>
