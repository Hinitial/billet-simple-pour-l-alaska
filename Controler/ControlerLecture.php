<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
 require_once 'Model/Episodes.php';
 require_once 'Model/Commentaire.php';
 require_once 'Controler/Controleur.php';

class ControlerLecture extends Controleur
{
  private $episode;
  private $commentaire;

  public function __construct()
  {
    $this->episode = new Episodes();
    $this->commentaire = new Commentaire();
  }

  public function index()
  {
    $idEpisode = $this->requete->getParametre('id');
    $episodes = $this->episode->getEpisodes($idEpisode);
    $commentaires = $this->commentaire->getCommentaireArticle($idEpisode);
    $this->genererVue(array('episodes' => $episodes, 'commentaires' => $commentaires), 'front');
  }

  public function commenter()
  {
    $nom = $this->requete->getParametre('nom');
    $post = $this->requete->getParametre('commentaire');
    $id_episode = $this->requete->getParametre('id');
    $commentaire = $this->commentaire->insertBdd($nom, $post, $id_episode);
    header('Location: index.php?section=lecture&id=' . $id_episode);
  }

  public function signalement()
  {
    $id_episode = $this->requete->getParametre('id');
    $id_commentaire = $this->requete->getParametre('id_commentaire');
    $this->commentaire->updateBDD($id_commentaire);
    header('Location: index.php?section=lecture&id=' . $id_episode);
  }
}
