<?php
/**
 *
 */
 require_once 'Model/Utilisateur.php';
 require_once 'Controler/Controleur.php';

class ControlerConnexion extends Controleur
{
  private $utilisateur;

  // Constructeur
  public function __construct()
  {
    $this->utilisateur = new Utilisateur();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $this->genererVue(array(), 'front');
  }

  // Connexion au back-end
  public function connexion()
  {
    // Si connexion réussie
    if ($this->utilisateur->verifierUtilisateur($this->requete)) {
      $_SESSION['connexion']=true;
      $_SESSION['alert']=false;
      $this->requete->redirection(array('section' => 'admin', ));
    }
    //Sinon...
    else {
      $_SESSION['alert']=true;
      $_SESSION['connexion']=false;
      $this->requete->redirection(array('section' => 'connexion', ));
    }
  }
}
