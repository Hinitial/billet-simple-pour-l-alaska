<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

abstract class Controleur {

  // Action à réaliser
  private $action;

  // Requête entrante
  protected $requete;

  // Définit la requête entrante
  public function setRequete(Requete $requete) {
    $this->requete = $requete;
  }

  // Exécute l'action à réaliser
  public function executerAction($action) {
    if (method_exists($this, $action)) {
      $this->action = $action;
      $this->{$this->action}();
    }
    else {
      $classeControleur = get_class($this);
      throw new Exception("Action '$action' non définie dans la classe $classeControleur");
    }
  }

  // Méthode abstraite correspondant à l'action par défaut
  public abstract function index();

  // Génère la vue associée au contrôleur courant
  protected function genererVue($donneesVue = array(), $affichage) {
    // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
    $classeControleur = get_class($this);
    $controleur = str_replace("BlogEcrivain\\Controler\\Controler", "", $classeControleur);
    // Instanciation et génération de la vue
    $vue = new \BlogEcrivain\Vue\Vue($affichage, $this->action, $controleur);
    $vue->afficher($donneesVue);
  }

  protected function pageIntrouvable(){
    $this->requete->redirection(array('section' => '404'));
  }
}
