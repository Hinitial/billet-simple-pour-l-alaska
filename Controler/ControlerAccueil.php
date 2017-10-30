<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Episodes.php';
 require_once 'Controler/Controleur.php';

class ControlerAccueil extends Controleur
{
  private $episode;

  public function __construct()
  {
    $this->episode = new Episodes();
  }

  public function index()
  {
    $episodes = $this->episode->getEpisodesExtrait(200, 0, 2);
    $this->genererVue(array('episodes' => $episodes), 'front');
  }
}
