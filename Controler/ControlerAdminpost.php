<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Episodes.php';
 require_once 'Controler/Controleur.php';

class ControlerAdminpost extends Controleur
{
  private $episode;

  public function __construct()
  {
    $this->episode = new Episodes();
  }

  public function index()
  {
    $episodes = $this->episode->getEpisodes();
    $this->genererVue(array('episodes' => $episodes), 'back');
  }
}
