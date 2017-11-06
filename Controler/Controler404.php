<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Controler/Controleur.php';

class Controler404 extends Controleur
{

  public function index()
  {
    $this->genererVue(array(), 'front');
  }
}
