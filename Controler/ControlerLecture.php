<?php
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

  // Constructeur
  public function __construct()
  {
    $this->episode = new Episodes();
    $this->commentaire = new Commentaire();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $idEpisode = $this->requete->getParametre('id');
    $episodes = $this->episode->getEpisodes($idEpisode);
    $commentaires = $this->commentaire->getCommentaireArticle($idEpisode);
    $this->genererVue(array('episodes' => $episodes, 'commentaires' => $commentaires), 'front');
  }

  // Laisse un commentare
  public function commenter()
  {
    $nom = $this->requete->getParametre('nom');
    $post = $this->requete->getParametre('commentaire');
    $id_episode = $this->requete->getParametre('id');
    $commentaire = $this->commentaire->insertBdd($nom, $post, $id_episode);
    $this->requete->redirection(array('section' => 'lecture', 'id' => $id_episode,));
  }

  // Signaler un commentaire
  public function signalement()
  {
    $id_episode = $this->requete->getParametre('id');
    $id_commentaire = $this->requete->getParametre('id_commentaire');
    $this->commentaire->signalementBDD($id_commentaire);
    $this->requete->redirection(array('section' => 'lecture', 'id' => $id_episode));
  }
}
