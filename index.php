<?php
session_start();

include_once('Model/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once("Controler/accueil.php");
}
else {
  switch ($_GET['section']) {
    case 'episode':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'lecture':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'connexion':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'admin':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'admin-post':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'admin-post-edit':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'gestion_episode':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'admin-comment':
      include_once("Controler/".$_GET['section'].".php");
      break;

    case 'deconnexion':
      include_once("Controler/".$_GET['section'].".php");
      break;

    default:
      # code...
      break;
  }
}
