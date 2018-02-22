<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

class ControlerAdminComment extends Controleur
{
  private $commentaire;

  // Constructeur
  public function __construct()
  {
    $this->commentaire = new \BlogEcrivain\Model\Commentaire();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $commentaires = $this->commentaire->getCommentaire();
    $this->genererVue(array('commentaires' => $commentaires), 'back');
  }
}
