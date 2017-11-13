<?php
/**
 *
 */
 require_once 'Controler/Controleur.php';

class ControlerAdmin extends Controleur
{

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $this->genererVue(array(), 'back');
  }
}
