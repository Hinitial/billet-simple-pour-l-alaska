<?php
  include('Vue/Elements/head.php');
  get_head('Lecture');
  include('Vue/Elements/nav.php');
?>

<div class="row justify-content-center">
 <div class="col-11 col-md-10 col-lg-8 col-xl-6 py-5">
   <article class="">
     <h1 class="text-center mb-5"><!-- BDD titre --></h1>
     <!-- BDD post -->
   </article>

   <!-- Commantaires -->
   <div class="mt-5">
     <h4>Commantaire</h4>

     <form class="pb-5 pt-2" action="index.html" method="post">
       <div class="form-group">
         <label for="nom">Nom utilisateur</label>
         <input type="text" id="nom" name="nom" value="" class="form-control" placeholder="Votre nom">
         <label for="commetaire">Commentaire</label>
         <textarea class="form-control" id="commentaire" rows="7" placeholder="Écrire un commentaire"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Publier</button>
     </form>

     <!-- BDD commentaire -->

   </div>
 </div>
</div>

<?php include('Vue/Elements/footer.php'); ?>
