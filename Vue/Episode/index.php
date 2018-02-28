<?php $this->titre = "Liste des épisodes"; ?>

<?php $tableau_mois = array( '1' => 'Janvier',
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
                              '12' => 'Décembre'); ?>

<!-- corp texte -->
 <div class="row no-gutters justify-content-center">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
    <h1 class="text-center my-5">Liste des Épisodes</h1>

        <?php
          //debut de la boucle
          foreach ($episodes as $enter):

            //dateTime declaration
            $date = new DateTime($enter['date_post']);
            $date_new = clone $date;
            $date_new->add(new DateInterval('P7D')); //intervale de 7 jours
            $now = new DateTime('now');
        ?>
        <div class="row">
          <div class="col-2 border border-bottom-0 border-left-0 border-right-0 border-primary py-4">
            <span class="text-center" style="font-size: 50px;"><?php echo $enter['id_episode']; ?></span>
          </div>


          <div class="col-10 border border-bottom-0 border-left-0 border-right-0 border-secondary py-4">
            <h4 class="col-12">
              <?php if ($now <= $date_new && $now >= $date): //Nouvel episode?>
                <span class="badge badge-danger mr-1">Nouveau</span>
              <?php endif; ?>

              <?php if ($now < $date): //Prochain episode?>
                <span class="badge badge-primary mr-1">Prochainement</span>
              <?php endif; ?>

              <?php if (!($now < $date)):?>
                <a href="index.php?section=lecture&id=<?php echo $enter['id_episode']; ?>" >
                  <?php echo $enter['titre']; ?>
                </a>
              <?php else: ?>
                <span><?php echo $enter['titre']; ?></span>
              <?php endif; ?>


            </h4>
            <p class="col-12"><?php echo strip_tags($enter['post']); ?>...</p>
            <p class="col-12 text-right text-secondary">
              <?php echo $enter['jour'].' '.$tableau_mois[($enter['mois'])].' '.$enter['annee']; ?>
            </p>
          </div>
        </div>
        <?php endforeach;  //fin de boucle?>

  </div>
</div>
