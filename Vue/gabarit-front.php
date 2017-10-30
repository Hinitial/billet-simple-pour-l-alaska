<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $titre ?> - Billet simple de l'Alaska</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="Vue/style-front.css" >
  </head>
  <body>
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
              <a class="nav-link" href="index.php">Accueil </a>
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

      <?php echo $corp ?>

      <!-- footer -->
      <footer class="row no-gutters justify-content-center text-light bg-dark">
        <div class="col-11 col-md-10 col-lg-8 col-xl-6 py-5">
          <p>Site créer par Alvarez Romain. <a href="#" class="badge badge-primary">Mentions légales</a></p>
        </div>
      </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
