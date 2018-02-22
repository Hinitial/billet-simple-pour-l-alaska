<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

class ControlerAdminCommentaireEdit extends Controleur
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
    $id_commentaire = $this->requete->getParametre('id');
    $commentaires = $this->commentaire->getCommentaire($id_commentaire);
    if($commentaires === false){
      $this->pageIntrouvable();
    }
    $this->genererVue(array('commentaires' => $commentaires), 'back');
  }

  // Modification d'un commantaire dans la base
  public function gestion()
  {
    $id_commentaire = $this->requete->getParametre('id');

    // Choix de l'action/bouton
    if (isset($_POST['brouillon'])) {
      $commentaires = $this->commentaire->updateBDD($id_commentaire, $_POST['post'], $_POST['signalement']);
    }
    elseif (isset($_POST['supprimer'])) {
      $commentaires = $this->commentaire->deleteBDD($id_commentaire);
    }
    else {
      # code...
    }
    $this->requete->redirection(array('section' => 'adminComment'));
  }

  // Suprimmer un commentaire
  public function supprimer(){
    $id_commentaire = $this->requete->getParametre('id');
    $commentaires = $this->commentaire->deleteBDD($id_commentaire);
    $this->requete->redirection(array('section' => 'adminComment'));
  }
}
