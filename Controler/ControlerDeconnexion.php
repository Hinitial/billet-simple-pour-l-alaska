<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

class ControlerDeconnexion extends Controleur
{
  private $episode;
  private $commentaire;

  // Constructeur
  public function __construct()
  {
    $this->episode = new \BlogEcrivain\Model\Episodes();
    $this->commentaire = new \BlogEcrivain\Model\Commentaire();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    session_destroy();
    if(isset($_SERVER['HTTP_REFERER'])){
      $this->requete->redirection($_SERVER['HTTP_REFERER']);
    }
    else{
      $this->requete->redirection(array());
    }
  }
}
