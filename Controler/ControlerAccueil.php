<?php
/**
 *
 */
 require_once 'Model/Episodes.php';
 require_once 'Controler/Controleur.php';

class ControlerAccueil extends Controleur
{
  private $episode;

  // Constructeur
  public function __construct()
  {
    $this->episode = new Episodes();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $episodes = $this->episode->getEpisodesAccueil();
    $this->genererVue(array('episodes' => $episodes), 'front');
  }
}
