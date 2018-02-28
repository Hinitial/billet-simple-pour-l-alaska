<?php
namespace BlogEcrivain\Controler;
use \DateTime;
/**
 *
 */

class ControlerAdminPostEdit extends Controleur
{
  private $episode;

  // Constructeur
  public function __construct()
  {
    $this->episode = new \BlogEcrivain\Model\Episodes();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $idEpisode = $this->requete->getParametre('id');
    $episodes = $this->episode->getEpisodes($idEpisode);
    if($episodes === false && $idEpisode != "new"){
      $this->pageIntrouvable();
    }
    $this->genererVue(array('episodes' => $episodes), 'back');
  }

  // Modification d'un épisode dans la base
  public function gestion()
  {
    //Valeur publication et date_post
    $publication;
    $date_post;

    // Déduction et/ou formatage des donné a insérer
    if (isset($_POST['publier'])) {
      $publication = 1;
      $date = new DateTime($_POST['date_post']);
      $date_post = $date->format('Y-m-d H:i:s');
    }
    elseif (isset($_POST['brouillon'])) {
      $publication = 0;
      $date_post = '0000-00-00 00:00:00';
    }

    // Choix de l'action/bouton
    if($_GET['db'] === 'insert'){
      $this->episode->insertBDD($_POST['titre'], $_POST['post'], $publication, $date_post);
    }
    elseif (isset($_POST['supprimer'])) {
      $this->episode->deleteBDD($_GET['id']);
    }
    elseif ($_GET['db'] === 'update') {
      $this->episode->updateBDD($_GET['id'], $_POST['titre'], $_POST['post'], $publication, $date_post);
    }
    else {
      echo 'erreur';
    }
    $this->requete->redirection(array('section' => 'adminPost', ));
  }
}
