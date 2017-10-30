<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Controler/Controleur.php';

class ControlerAdmin extends Controleur
{

  public function index()
  {
    $this->genererVue(array('vide'), 'back');
  }
}
