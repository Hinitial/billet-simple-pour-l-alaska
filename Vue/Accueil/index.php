<?php $this->titre = "Accueil"; ?>

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

<!-- Photo header-->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="Photos/home.jpg" alt="Home">
      <div class="carousel-caption d-none d-md-block align-items-start ">


        <h3 class="col-12 text-center">Billet simple pour L'Alaska</h3>
        <p class="col-12 text-center mb-3">Un voyage sans retour</p>
        <p class="text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut gravida mauris. Fusce quis ante vitae purus hendrerit sollicitudin. Integer ac mollis lectus. Curabitur tellus erat, pellentesque in dictum eget, tincidunt varius enim. Nam non fermentum nunc, et feugiat mauris. Ut porttitor dolor in lacus placerat, et dictum odio eleifend. Suspendisse justo justo, auctor nec sem eget, placerat varius risus. Sed ultricies dignissim molestie. Sed pellentesque auctor interdum. Morbi non pulvinar est. Cras a felis tincidunt, elementum purus nec, dapibus nisl. Maecenas sem odio, consequat ac egestas a, consectetur quis elit.
        </p>
        <p class="text-justify">
          Nullam interdum rutrum ultrices. Phasellus fermentum, lorem eget pharetra dapibus, orci ligula consectetur massa, et volutpat dui quam non sem. Praesent non arcu eget sapien fermentum laoreet non quis libero. Nunc egestas est ac tempor fringilla. Ut erat nisl, accumsan non justo vitae, facilisis rhoncus massa. Sed eget commodo ex, a dapibus dui. Morbi quis massa non lacus tempor molestie sed vel sem. Etiam diam ipsum, rutrum a sapien ut, faucibus gravida diam. In et tristique odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce convallis pharetra metus, at ultricies neque consectetur vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
        <a href="episodes.html" class="btn btn-primary">Commencer la lecture</a>
      </div>
    </div>
  </div>
</div>

<div class="row no-gutters justify-content-center">
 <div class="col-12 col-md-10 col-lg-8 col-xl-6 py-5">
   <h4 class="text-center">Derniers épisodes</h4>
   <div class="row">

     <?php
       //debut de la boucle
       foreach ($episodes as $enter):

         //dateTime declaration
         $date = new DateTime($enter['date_post']);
         $date_new = clone $date;
         $date_new->add(new DateInterval('P7D')); //intervale de 7 jours
         $now = new DateTime('now');
     ?>
       <div class="col-12 col-sm-6 py-3">
         <div class="card">
           <div class="card-body">
             <p class="card-text text-center">
               <?php if ($now <= $date_new && $now >= $date): //Nouvel episode?>
                 <span class="badge badge-danger mr-1">New</span>
               <?php endif; ?>

               <?php if ($now < $date): //Prochain episode?>
                 <span class="badge badge-primary mr-1">Coming soon</span>
               <?php endif; ?>
             </p>
             <h4 class="card-title text-center"><?php echo $enter['titre']; ?></h4>
             <p class="card-text"><?php echo strip_tags($enter['post']); ?>...</p>
             <p class="text-secondary"><?php echo $enter['jour'].' '.$tableau_mois[($enter['mois'])].' '.$enter['annee']; ?></p>
             <a href="index.php?section=lecture&id=<?php echo $enter['id_episode']; ?>" class="btn btn-secondary">Aller a l'épisode</a>
           </div>
         </div>
       </div>
     <?php endforeach; ?>

     </div>
   </div>
 </div>
</div>

<div class="row no-gutters justify-content-center bg-primary text-white">
 <div class="col-12 col-md-10 col-lg-8 col-xl-6 py-5">
   <h4 class="text-center mb-5">Jean Forteroche</h4>
   <div class="row justify-content-center">
     <div class="col-11 col-md-4 py-2">
       <img class="img-fluid" src="Photos/ecriture.jpg" alt="auteur">
     </div>
     <div class="col-11 col-md-6 py-2">
       <p class="text-justify">
         Nam convallis hendrerit lacus, vitae aliquet orci finibus sed. Donec gravida lectus sit amet rutrum varius. Pellentesque porta nunc sit amet ligula ultricies cursus. Etiam consequat ipsum congue, tincidunt quam laoreet, sodales orci. Duis eget efficitur lectus. In hac habitasse platea dictumst. Duis finibus, justo vel iaculis pellentesque, risus risus malesuada ligula, sed maximus urna nisi sed urna.
       </p>
     </div>
   </div>
 </div>
</div>
