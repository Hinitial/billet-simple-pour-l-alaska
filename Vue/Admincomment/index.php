<?php $this->titre = "Administration commentaire";

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
  <table class="table table-striped mb-5">
    <thead class="thead-inverse">
      <tr scope="row" class="">
        <th>Id</th>
        <th>Utilisateur</th>
        <th>Épisode</th>
        <th class="text-center">Signalement</th>
        <th class="text-right">Date</th>
      </tr>
    </thead>
    <tbody class="">

      <?php
        //debut de la boucle
        foreach ($commentaires as $enter):
      ?>
      <tr scope="row">
        <th><?php echo $enter['id_commentaire']; ?></th>
        <td><?php echo $enter['nom']; ?></td>
        <td><?php echo $enter['id_episode']; ?></td>
        <?php if ($enter['signalement'] < 1): ?>
          <td class="text-center"><span class="badge badge-danger"><?php echo $enter['signalement']; ?></span></td>
        <?php else: ?>
          <?php if ($enter['signalement'] > 5): ?>
            <td class="text-center"><span class="badge badge-warning"><?php echo $enter['signalement']; ?></span></td>
          <?php else: ?>
            <td class="text-center"><span class="badge badge-secondary"><?php echo $enter['signalement']; ?></span></td>
          <?php endif; ?>
        <?php endif; ?>
        <td class="text-right text-secondary"><?php echo $enter['date_post']; ?></td>
      </tr>
      <?php endforeach;  //fin de boucle?>
    </tbody>
  </table>
</div>
</div>
