<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Commentaire.php';
 require_once 'Controler/Controleur.php';

class ControlerAdminComment extends Controleur
{
  private $commentaire;

  public function __construct()
  {
    $this->commentaire = new Commentaire();
  }

  public function index()
  {
    $commentaires = $this->commentaire->getCommentaire();
    $this->genererVue(array('commentaires' => $commentaires), 'back');
  }
}
