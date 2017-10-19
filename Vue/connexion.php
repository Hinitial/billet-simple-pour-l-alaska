<?php
  include('Vue/Elements/head.php');
  get_head('Connexion','');
?>

<!-- corp -->
 <div class="row justify-content-center align-items-center" >
  <div class="col-11 col-md-10 col-lg-8 col-xl-6 py-5" >
    <?php if ($_SESSION['alert'] == true): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        Identifiants incorrect
      </div>
      <?php $_SESSION['alert']=false; ?>
    <?php endif; ?>
    <h1 class="row justify-content-center" >Connexion</h1>
    <p class="row justify-content-center" >Administration du site</p>
    <form class="" action="index.php?section=connexion" method="post">
      <div class="row justify-content-center py-2">
        <div class="col-12 col-sm-6">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
      </div>
      <div class="row justify-content-center pb-3">
        <div class="col-12 col-sm-6">
          <input type="password" class="form-control" name="password" placeholder="Mot de passe">
        </div>
      </div>
      <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary" name="button">Connexion</button>
      </div>
    </form>
    <p class="row justify-content-center py-3" ><a href="index.php">Revenir au site</a></p>
  </div>
</div>
</div>

<?php include_once('Vue/Elements/end.php'); ?>
