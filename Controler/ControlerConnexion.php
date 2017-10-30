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
    if(isset($_POST['email']) AND isset ($_POST['password'])){

      $identifiant = $this->requete->getParametre('email');
      $password = $this->requete->getParametre('password');

      //Sécurité
      $identifiant = strip_tags($identifiant);
      $password = strip_tags($password);

      //Variable de session
      $_SESSION['alert']=true;
      $_SESSION['connexion']=false;


      $utilisateur = $this->utilisateur->getUtilisateur($identifiant);

      if ($utilisateur['password'] == password_verify($password, $utilisateur['password'])) {
        $_SESSION['connexion']=true;
        $_SESSION['alert']=false;
        header('Location: index.php?section=admin');
        exit();
      }
      else {
        header('Location: index.php?section=connexion');
        exit();
      }
    }
  }
}

$_SESSION['alert']=false;
