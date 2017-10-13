<?php include('Vue/Elements/head.php'); ?>
<?php include('Vue/Elements/nav.php'); ?>

<!-- Photo header-->
<div class="row">
  <div class="col-12">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="Vue/Photos/home.jpg" alt="Home">
          <div class="carousel-caption d-none d-md-block">
            <h3>Billet simple pour L'Alaska</h3>
            <p>Un voyage sans retour</p>
            <a href="episodes.php" class="btn btn-primary">Commencer la lecture</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- corp -->
 <div class="row justify-content-center">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6 py-5">

    <div class="d-flex flex-column-reverse flex-sm-row justify-content-center align-items-center">
      <div class="col-12 col-sm-9 text-center text-sm-left">
        <h4>Une nouvelle facon de publié</h4>
        <p>
          Changement d'aire. Accedez directement en ligne à l'ouvre original<br>
          Un nouveau modele économique, plus pratique et plus moderne
        </p>
      </div>
      <div class="col-6 col-sm-3">
        <img class="img-fluid p-5" alt="home_1" src="Vue/Photos/edit.png">
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center">
      <div class="col-6 col-sm-3">
        <img class="img-fluid p-5" alt="home_2" src="Vue/Photos/information.png">
      </div>
      <div class="col-12 col-sm-9 text-center text-sm-right">
        <h4>Restez Informé</h4>
        <p>
          Un projet édité sur la durée. Connectez-vous pour suivre la publication<br>
          Suivez pas à pas chaque épisodes
        </p>
      </div>
    </div>

    <div class="d-flex flex-column-reverse flex-sm-row justify-content-center align-items-center">
      <div class="col-12 col-sm-9 text-center text-sm-left">
        <h4>Réagisez facilement</h4>
        <p>Réagisez, débatez, intéragisez avec l'auteur et les autres lecteurs.</p>
      </div>
      <div class="col-6 col-sm-3">
        <img class="img-fluid p-5" alt="home_3" src="Vue/Photos/chat.png">
      </div>
    </div>
  </div>
</div>

<?php include('Vue/Elements/footer.php'); ?>
