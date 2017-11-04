<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Commentaire.php';
 require_once 'Controler/Controleur.php';

class ControlerAdmincommentaireedit extends Controleur
{
  private $commentaire;

  public function __construct()
  {
    $this->commentaire = new Commentaire();
  }

  public function index()
  {
    $id_commentaire = $this->requete->getParametre('id');
    $commentaires = $this->commentaire->getCommentaire($id_commentaire);
    $this->genererVue(array('commentaires' => $commentaires), 'back');
  }
}
