<?php
/**
 *
 */
 require_once 'Model/Episodes.php';
 require_once 'Model/Commentaire.php';
 require_once 'Controler/Controleur.php';

class ControlerDeconnexion extends Controleur
{
  private $episode;
  private $commentaire;

  // Constructeur
  public function __construct()
  {
    $this->episode = new Episodes();
    $this->commentaire = new Commentaire();
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
