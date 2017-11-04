<?php $this->titre = "Administration édition";

  $tableau_mois = array( '1' => 'Janvier',
                                '2' => 'Février',
                                '3' => 'Mars',
                                '4' => 'Avril',
                                '5' => 'Mai',
                                '6' => 'Juin',
                                '7' => 'Juillet',
                                '8' => 'Août',
                                '9' => 'Septembre',
                                '10' => 'Octobre',
                                '11' => 'Novembre',
                                '12' => 'Décembre');
?>

<!-- corp texte -->
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script src="tinymce/js/tinymce/jquery.tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<div class="row no-gutters justify-content-center">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
    <h1 class="text-center my-5">Édition</h1>
    <form class="mb-5" action="index.php?section=adminedit&action=gestion&db=<?php if($_GET['id'] == 'new'){echo 'insert';}else{echo 'update&id='.$_GET['id'];}?>" method="post">
      <div class="form-group">
        <label for="titre">Titre de l'épisode</label>
        <input type="text" class="form-control" name="titre" id="titre" value="<?php if($_GET['id'] !== 'new'){echo $episodes['titre'];}else{echo 'Votre titre';}?>">
      </div>
      <div class="form-group">
        <label for="episode">Épisode</label>
        <textarea id="episode" class="form-control" name="post" rows="25" value=""><?php if($_GET['id'] !== 'new'){echo $episodes['post'];}else{echo 'Votre post';}?></textarea>
      </div>


      <div class="row">

        <?php //Bouton de formulaire

        //Si nouveau episode :
        if ($_GET['id'] == 'new'): ?>
          <div class="col-sm-5">
            <div class="input-group">
              <span class="input-group-btn">
                <button type="submit" name="publier" class="btn btn-primary">Publier</button>
              </span>
              <input type="datetime-local" class="form-control" id="date_post" name="date_post" value="">
            </div>
          </div>
          <button type="submit" class="btn btn-warning" id="brouillon" name="brouillon">Enregistrer en broullon</button>
        <?php
        //Si deja enregistré
        else: ?>

          <?php
          // Si deja publié
          if ($episodes['publication'] == true): ?>
            <div class="col-sm-5">
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="submit" name="publier" class="btn btn-primary">Enregistrer</button>
                </span>
                <?php
                  $date = new DateTime($episodes['date_post']);
                  $date_post = $date->format('Y-m-d\TH:i:s');
                 ?>
                <input type="datetime-local" class="form-control" id="date_post" name="date_post" value="<?php echo $date_post;?>">
              </div>
            </div>
            <button type="submit" class="btn btn-danger" id="supprimer" name="supprimer">Supprimer</button>

          <?php
          // Si non publié
          else: ?>
            <div class="col-sm-5">
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="submit" name="publier" class="btn btn-primary">Publier</button>
                </span>
                <input type="datetime-local" class="form-control" id="date_post" name="date_post" value="">
              </div>
            </div>
            <button type="submit" class="btn btn-warning mr-2" id="brouillon" name="brouillon">Enregistrer en brouillon</button>
            <button type="submit" class="btn btn-danger " id="supprimer" name="supprimer">Supprimer</button>
          <?php endif; ?>
        <?php endif; ?>


      </div>

    </form>
  </div>
</div>
