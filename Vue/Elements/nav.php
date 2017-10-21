<!-- nav -->
<nav class="justify-content-center navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
  <a class="navbar-brand d-sm-none" href="index.html">Billet simple pour l'Alaska</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggle">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item <?php echo (!isset($_GET['section']) OR $_GET['section'] == 'index') ? 'active' : '' ; ?>">
        <a class="nav-link" href="index.php">Acceuil </a>
      </li>
      <li class="nav-item <?php echo (($_GET['section']) === 'episode') ? 'active' : '' ;?>">
        <a class="nav-link" href="index.php?section=episode">Épisodes</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if(!isset($_SESSION['connexion']) || $_SESSION['connexion'] !== true): ?>
        <a class="btn btn-outline-primary my-2 my-sm-0" href="index.php?section=connexion">Connexion</a>
      <?php else: ?>
        <a class="btn btn-outline-danger my-2 mr-2 my-sm-0" href="index.php?section=deconnexion">Deconnexion</a>
        <a class="btn btn-outline-secondary my-2 my-sm-0" href="index.php?section=admin">Administration</a>
      <?php endif; ?>
    </form>
  </div>
  </div>
</nav>
