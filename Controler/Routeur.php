<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
require_once 'Controler/Requete.php';
require_once 'Vue/Vue.php';

class Routeur
{

  public function routerRequete()
  {
    try {

      $requete = new Requete(array_merge($_GET, $_POST));

      $controleur = $this->creerControleur($requete);
      $action = $this->creerAction($requete);

      $controleur->executerAction($action);
    } catch (Exception $e) {
      $this->gererErreur($e);
    }

  }

  public function creerControleur(Requete $requete)
  {
    $controleur = 'Accueil';
    if ($requete->existeParametre('section')) {
      if ((isset($_SESSION['connexion']) !== true || $_SESSION['connexion'] !== true) && strpos(($requete->getParametre('section')),'admin') !== false) {
        $requete->redirection(array('section' => 'connexion', ));
      }
      $controleur = $requete->getParametre('section');
      // Première lettre en majuscule
      $controleur = ucfirst($controleur);
    }
    // Création du nom du fichier du contrôleur
    $classeControleur = "Controler" . $controleur;
    $fichierControleur = "Controler/" . $classeControleur . ".php";
    if (!file_exists($fichierControleur)) {
      $this->redirection(array('section' => '404', ));
    }
    require($fichierControleur);
    $controleur = new $classeControleur();
    $controleur->setRequete($requete);
    return $controleur;
  }

  public function creerAction(Requete $requete)
  {
    $action = "index";
    if ($requete->existeParametre('action')) {
      $action = $requete->getParametre('action');
    }
    return $action;
  }

  // Gère une erreur d'exécution (exception)
  private function gererErreur(Exception $exception)
  {
    $vue = new Vue('erreur', '');
    //$vue->afficher(array('msgErreur' => $exception->getMessage()));
    echo $exception->getMessage();
  }
}

 ?>
