<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Commentaire.php';
 require_once 'Controler/Controleur.php';

class ControlerAdminCommentaireEdit extends Controleur
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

  public function gestion()
  {
    $id_commentaire = $this->requete->getParametre('id');

    if (isset($_POST['brouillon'])) {
      $commentaires = $this->commentaire->updateBDD($id_commentaire, $_POST['post']);
    }
    elseif (isset($_POST['supprimer'])) {
      $commentaires = $this->commentaire->deleteBDD($id_commentaire);
    }
    else {
      # code...
    }
    $this->requete->redirection(array('section' => 'adminComment'));
  }

  public function supprimer(){
    $id_commentaire = $this->requete->getParametre('id');
    $commentaires = $this->commentaire->deleteBDD($id_commentaire);
    $this->requete->redirection(array('section' => 'adminComment'));
  }
}
