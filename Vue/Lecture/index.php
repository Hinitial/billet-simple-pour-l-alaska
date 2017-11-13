<?php $this->titre = "Lecture"; ?>

<div class="row no-gutters justify-content-center">
 <div class="col-11 col-md-10 col-lg-8 col-xl-6 py-5">
   <article class="lecture">
     <h1 class="text-center mb-5"><?php echo $episodes['titre']; ?></h1>
     <?php echo $episodes['post']; ?>
   </article>

   <!-- Commantaires -->
   <div class="mt-5">
     <h4>Commentaire</h4>

     <form class="pb-5 pt-2" action="index.php?section=lecture&action=commenter&id=<?php echo $_GET['id']; ?>" method="post">
       <div class="form-group">
         <label for="nom">Nom utilisateur</label>
         <input type="text" id="nom" name="nom" value="" class="form-control" placeholder="Votre nom">
         <label for="commetaire">Commentaire</label>
         <textarea class="form-control" id="commentaire" name="commentaire" rows="7" placeholder="Écrire un commentaire"></textarea>
         <small id="commentairesTips" class="form-text text-muted">
           Repondez à un commentaire en le tagant avec @ suivi de son nom. Exemple : @Fred
         </small>
       </div>
       <button type="submit" class="btn btn-primary">Publier</button>
     </form>

     <!-- BDD commentaire -->
     <?php
       //debut de la boucle
       foreach ($commentaires as $enter):
     ?>
       <article class="border border-bottom-0 border-left-0 border-right-0 border-secondary py-4">
         <p class="font-weight-bold"><?php echo $enter['nom']; ?></p>
         <p><?php echo preg_replace('#(@[a-zA-Z0-9]{1,30})#', '<mark class="text-info p-1">$1</mark>', $enter['post']); ?></p>
         <p class="text-secondary"><?php echo $enter['date_post']; ?></p>
         <form class="" action="index.php?section=lecture&action=signalement&id=<?php echo $_GET['id']; ?>" method="post">
           <input type="hidden" name="id_commentaire" value="<?php echo $enter['id_commentaire']; ?>">
           <button type="submit" class="btn btn-warning btn-sm" name="button">Signalez</button>
         </form>
       </article>
     <?php endforeach;  //fin de boucle?>

   </div>
 </div>
</div>
