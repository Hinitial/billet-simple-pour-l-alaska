<?php
if($_SESSION['connexion'] == true){
  include_once('Vue/admin-comment.php');
}
else {
  header('Location: connexion.php');
}
