<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

class ControlerEpisode extends Controleur
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
    $episodes = $this->episode->getEpisodesExtrait(300);
    $this->genererVue(array('episodes' => $episodes), 'front');
  }
}
