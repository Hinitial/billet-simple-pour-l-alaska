<?php $this->titre = "Administration modération";

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

<!-- corp -->

<!-- corp texte -->
<div class="row no-gutters justify-content-center">
<div class="col-12 col-md-10 col-lg-8 col-xl-6">
  <h1 class="text-center my-5">Modération</h1>
  <form class="mb-5" action="index.html" method="post">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" value="<?php echo $commentaires['nom']; ?>" readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="episode">Épisode</label>
        <input type="text" class="form-control" id="episode" value="<?php echo $commentaires['id_episode']; ?>" readonly>
      </div>
      <div class="form-group col-md-2">
        <label for="signalement">Signalement</label>
        <input type="text" class="form-control" id="signalement" value="<?php echo $commentaires['signalement']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label for="episode">Commentaire</label>
      <textarea id="episode" class="form-control" name="post" rows="15" value=""><?php echo $commentaires['post']; ?></textarea>
    </div>
    <div class="row">
      <div class="form-group">
        <button type="submit" class="btn btn-warning mr-2" id="brouillon" name="brouillon">Enregistrer les Modifications</button>
        <button type="submit" class="btn btn-danger " id="supprimer" name="supprimer">Supprimer</button>
      </div>
    </div>
  </form>
</div>
</div>
