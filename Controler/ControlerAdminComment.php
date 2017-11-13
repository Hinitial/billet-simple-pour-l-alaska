<?php
/**
 *
 */
 require_once 'Model/Commentaire.php';
 require_once 'Controler/Controleur.php';

class ControlerAdminComment extends Controleur
{
  private $commentaire;

  // Constructeur
  public function __construct()
  {
    $this->commentaire = new Commentaire();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $commentaires = $this->commentaire->getCommentaire();
    $this->genererVue(array('commentaires' => $commentaires), 'back');
  }
}
