<?php
session_start();

use BilletSimpleAlaska as BSA;

require_once 'Controler/Routeur.php';

//require 'Autoloader.php';
//Autoloader::register();

$routeur = new Routeur();
$routeur->routerRequete();
