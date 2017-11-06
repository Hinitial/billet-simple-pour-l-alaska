<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Utilisateur.php';
 require_once 'Controler/Controleur.php';

class ControlerConnexion extends Controleur
{
  private $utilisateur;

  public function __construct()
  {
    $this->utilisateur = new Utilisateur();
  }

  public function index()
  {
    $this->genererVue(array(), 'front');
  }

  public function connexion()
  {
    if ($this->utilisateur->verifierUtilisateur($this->requete)) {
      $_SESSION['connexion']=true;
      $_SESSION['alert']=false;
      $this->requete->redirection(array('section' => 'admin', ));
    }
    else {
      $_SESSION['alert']=true;
      $_SESSION['connexion']=false;
      $this->requete->redirection(array('section' => 'connexion', ));
    }
  }
}
