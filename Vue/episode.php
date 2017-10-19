<?php
  include('Vue/Elements/head.php');
  get_head('Liste des épisodes','front');
  include('Vue/Elements/nav.php');
?>
<<?php $tableau_mois = array( '1' => 'Janvier',
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
 <div class="row justify-content-center">
  <div class="col-12 col-md-10 col-lg-8 col-xl-6">
    <h1 class="text-center my-5">Liste des Épisodes</h1>

        <?php
          //debut de la boucle
          foreach ($liste as $enter):

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
                <span class="badge badge-danger mr-1">New</span>
              <?php endif; ?>

              <?php if ($now < $date): //Prochain episode?>
                <span class="badge badge-primary mr-1">Coming soon</span>
              <?php endif; ?>

              <a href="index.php?section=lecture&post=<?php echo $enter['id_episode']; ?>" >
                <?php echo $enter['titre']; ?>
              </a>
            </h4>
            <p class="col-12">Nam convallis hendrerit lacus, vitae aliquet orci finibus sed. Donec gravida lectus sit amet rutrum varius. Pellentesque porta nunc sit amet ligula ultricies cursus. Etiam consequat ipsum congue, tincidunt quam laoreet, sodales orci. Duis eget efficitur lectus. In hac habitasse platea dictumst. Duis finibus, justo vel iaculis pellentesque, risus risus malesuada ligula, sed maximus urna nisi sed urna.</p>
            <p class="col-12 text-right text-secondary">
              <?php echo $enter['jour'].' '.$tableau_mois[($enter['mois'])].' '.$enter['annee']; ?>
            </p>
          </div>
        </div>
        <?php endforeach;  //fin de boucle?>

  </div>
</div>

<?php include('Vue/Elements/footer.php'); ?>
