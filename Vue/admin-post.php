<?php
  include('Vue/Elements/head.php');
  get_head('Administration épisode','back');
  include('Vue/Elements/nav-admin.php');

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
    <h1 class="text-center my-5">Liste des Épisodes</h1>
    <a class="btn btn-primary" href="index.php?section=admin-post-edit&id=new">Ajouter un épisode</a>
    <table class="table table-striped mb-5">
      <thead class="thead-inverse">
        <tr scope="row" class="">
          <th>#</th>
          <th>Titre</th>
          <th>État</th>
          <th class="text-right">Date</th>
        </tr>
      </thead>
      <tbody class="">

        <?php
          //debut de la boucle
          foreach ($liste as $enter):
        ?>
        <tr scope="row">
          <th><?php echo $enter['id_episode']; ?></th>
          <td><a href="index.php?section=admin-post-edit&id=<?php echo $enter['id_episode']; ?>"><?php echo $enter['titre']; ?></a></td>
          <?php if ($enter['publication'] == false): ?>
            <td class="text-warning">Brouillon</td>
          <?php endif; ?>
          <?php if ($enter['publication'] == true): ?>
            <td class="text-success">Publié</td>
          <?php endif; ?>
          <td class="text-right text-secondary">
            <?php if ($enter['publication'] == true): ?>
              <?php echo $enter['jour'].' '.$tableau_mois[($enter['mois'])].' '.$enter['annee']; ?>
            <?php else: ?>
              -
            <?php endif; ?>

          </td>
        </tr>
        <?php endforeach;  //fin de boucle?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once('Vue/Elements/end.php'); ?>
