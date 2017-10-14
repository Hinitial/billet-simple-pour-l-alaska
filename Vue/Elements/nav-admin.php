<!-- nav -->
<nav class="justify-content-center navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
  <a class="navbar-brand d-sm-none" href="index.html">Billet simple pour l'Alaska</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], '/admin.php') === FALSE) ? '' : 'active' ;?>">
        <a class="nav-link" href="admin.php">Acceuil </a>
      </li>
      <li class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], '/admin-post.php') === FALSE) ? '' : 'active' ;?>">
        <a class="nav-link" href="admin-post.php">Épisodes</a>
      </li>
      <li class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], '/admin-comment.php') === FALSE) ? '' : 'active' ;?>">
        <a class="nav-link" href="admin-comment.php">Commentaires</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
