<?php
namespace BlogEcrivain;
use \BlogEcrivain\Autoloader;

require 'Controler/Autoloader.php';
Autoloader::register();

session_start();

//require_once 'Controler/Routeur.php';

$routeur = new Controler\Routeur();
$routeur->routerRequete();
