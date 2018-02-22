<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

class ControlerAdminPost extends Controleur
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
    $episodes = $this->episode->getEpisodes();
    $this->genererVue(array('episodes' => $episodes), 'back');
  }
}
