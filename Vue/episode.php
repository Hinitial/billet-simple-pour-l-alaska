<?php include('Elements/head.php'); ?>
<?php include('Elements/nav.php'); ?>

<!-- corp texte -->
 <div class="row justify-content-center">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
    <h1 class="my-5">Liste des Épisodes</h1>

    <!-- table -->
    <table class="table table-striped mb-5">

      <!-- en-tête -->
      <thead class="thead-inverse">
        <tr scope="row" class="">
          <th>#</th>
          <th>Nom</th>
          <th class="text-right">Date</th>
        </tr>
      </thead>

      <!-- corp tableau -->
      <tbody class="">
        <?php
          //debut de la boucle
          foreach ($liste as $enter):

            //dateTime declaration
            $date = new DateTime($enter['date_post']);
            $date_new = clone $date;
            $date_new->add(new DateInterval('P7D'));
            $now = new DateTime('now');
        ?>
          <tr scope="row">
            <th><?php echo $enter['id_episode']; //Numero de l'épisode ?></th>
            <td>
              <?php if ($now <= $date_new && $now >= $date): //Nouvel episode?>
                <span class="badge badge-danger mr-1">New</span>
              <?php endif; ?>
              <?php if ($now < $date): //Prochain episode?>
                <span class="badge badge-primary mr-1">Coming soon</span>
              <?php endif; ?>
              <a href="lecture.php?post=<?php echo $enter['id_episode']; ?>" <?php if ($now < $date): ?> disabled<?php endif; ?>>
                <?php echo $enter['titre']; ?>
              </a>
            </td>
            <td class="text-right text-secondary">
              <?php echo $enter['date_post']//$enter['jour'].' '.$enter['mois'].' '.$enter['annee']; ?>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>

<?php include('Elements/footer.php'); ?>
