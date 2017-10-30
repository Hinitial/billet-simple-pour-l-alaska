<?php $this->titre = "Lecture"; ?>

<div class="row justify-content-center">
 <div class="col-11 col-md-10 col-lg-8 col-xl-6 py-5">
   <article class="">
     <h1 class="text-center mb-5"><?php echo $episodes['titre']; ?></h1>
     <?php echo $episodes['post']; ?>
   </article>

   <!-- Commantaires -->
   <div class="mt-5">
     <h4>Commentaire</h4>

     <form class="pb-5 pt-2" action="index.html?section=lecture&id=<?php echo $_GET['id']; ?>" method="post">
       <div class="form-group">
         <label for="nom">Nom utilisateur</label>
         <input type="text" id="nom" name="nom" value="" class="form-control" placeholder="Votre nom">
         <label for="commetaire">Commentaire</label>
         <textarea class="form-control" id="commentaire" name="commentaire" rows="7" placeholder="Écrire un commentaire"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Publier</button>
     </form>

     <!-- BDD commentaire -->
     <?php
       //debut de la boucle
       foreach ($commentaires as $enter):
     ?>
       <article class="border border-bottom-0 border-left-0 border-right-0 border-secondary py-4">
         <p><?php echo $enter['nom']; ?></p>
         <p><?php echo $enter['id_commentaire']; ?></p>
         <p class="text-secondary"><?php echo $enter['date_post']; ?></p>
         <form class="" action="index.html" method="post">
           <input type="hidden" name="id_comment" value="">
           <button type="submit" class="btn btn-warning btn-sm" name="button">Signalez</button>
         </form>
       </article>
     <?php endforeach;  //fin de boucle?>

   </div>
 </div>
</div>
