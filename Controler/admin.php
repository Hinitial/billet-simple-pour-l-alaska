<?php
if($_SESSION['connexion'] == true){
  include_once('Vue/admin.php');
}
else {
  header('Location: connexion.php');
}
