<!-- nav -->
<nav class="justify-content-center navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php?section=index">Retour au site </a>
      </li>
      <li class="nav-item <?php echo (($_GET['section']) === 'admin') ? 'active' : '' ;?>">
        <a class="nav-link" href="index.php?section=admin">Acceuil </a>
      </li>
      <li class="nav-item <?php echo (($_GET['section']) === 'admin-post') ? 'active' : '' ;?>">
        <a class="nav-link" href="index.php?section=admin-post">Épisodes</a>
      </li>
      <li class="nav-item <?php echo (($_GET['section']) === 'admin-comment') ? 'active' : '' ;?>">
        <a class="nav-link" href="index.php?section=admin-comment">Commentaires</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if ($_SESSION['connexion'] === true): ?>
        <a class="btn btn-light my-2 my-sm-0" href="index.php?section=deconnexion">Deconnexion</a>
      <?php else: ?>
        <a class="btn btn-outline-primary my-2 my-sm-0" href="index.php?section=connexion">Connexion</a>
      <?php endif; ?>
    </form>
  </div>
  </div>
</nav>
