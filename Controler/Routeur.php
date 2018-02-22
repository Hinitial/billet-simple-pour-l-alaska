<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

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

  // Creer un Objet Controleur adapté à la requete
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
    $namespceControleur = "BlogEcrivain\\Controler\\" . $classeControleur;
    if (!file_exists($fichierControleur)) {
      $requete->redirection(array('section' => '404', ));
    }
    //require($fichierControleur);
    $controleur = new $namespceControleur();
    $controleur->setRequete($requete);
    return $controleur;
  }

  // Renvoie l'action de la requete, index par defaut
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
    $vue = new \BlogEcrivain\Vue\Vue('erreur', '');
    //$vue->afficher(array('msgErreur' => $exception->getMessage()));
    echo $exception->getMessage();
  }
}

 ?>
