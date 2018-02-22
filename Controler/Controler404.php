<?php
namespace BlogEcrivain\Controler;
/**
 *
 */

class Controler404 extends Controleur
{
  // Fonction d'affichage, par defaut.
  public function index()
  {
    $this->genererVue(array(), 'front');
  }
}
