<?php
if($_SESSION['connexion'] == true){
  include_once('Vue/admin-post.php');
}
else {
  header('Location: index.php?section=connexion');
}
