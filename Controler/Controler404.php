<?php
/**
 *
 */
 require_once 'Controler/Controleur.php';

class Controler404 extends Controleur
{
  // Fonction d'affichage, par defaut.
  public function index()
  {
    $this->genererVue(array(), 'front');
  }
}
