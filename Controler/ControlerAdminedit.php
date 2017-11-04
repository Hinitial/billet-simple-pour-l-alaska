<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Episodes.php';
 require_once 'Controler/Controleur.php';

class ControlerAdminedit extends Controleur
{
  private $episode;

  public function __construct()
  {
    $this->episode = new Episodes();
  }

  public function index()
  {
    $idEpisode = $this->requete->getParametre('id');
    $episodes = $this->episode->getEpisodes($idEpisode);
    $this->genererVue(array('episodes' => $episodes), 'back');
  }

  public function gestion()
  {
    //Valeur publication et date_post?
    $publication;
    $date_post;

    if (isset($_POST['publier'])) {
      $publication = 1;
      $date = new DateTime($_POST['date_post']);
      $date_post = $date->format('Y-m-d H:i:s');
    }
    elseif (isset($_POST['brouillon'])) {
      $publication = 0;
      $date_post = '0000-00-00 00:00:00';
    }

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

    header('Location: index.php?section=adminpost');
  }
}
