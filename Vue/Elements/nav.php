<!-- nav -->
<nav class="justify-content-center navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
  <a class="navbar-brand d-sm-none" href="index.php">Billet simple pour l'Alaska</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], '/index.php') === FALSE) ? '' : 'active' ;?>">
        <a class="nav-link" href="index.php">Acceuil </a>
      </li>
      <li class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], '/episodes.php') === FALSE) ? '' : 'active' ;?>">
        <a class="nav-link" href="episodes.php">Épisodes</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-outline-primary my-2 my-sm-0" href="#">Connexion</a>
    </form>
  </div>
  </div>
</nav>
