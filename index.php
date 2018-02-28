<?php
namespace BlogEcrivain;
use \BlogEcrivain\Autoloader;

require 'Controler/Autoloader.php';
Autoloader::register();

session_start();

$routeur = new Controler\Routeur();
$routeur->routerRequete();
