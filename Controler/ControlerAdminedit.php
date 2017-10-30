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
}
