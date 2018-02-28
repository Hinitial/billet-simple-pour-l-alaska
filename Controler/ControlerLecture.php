<?php
namespace BlogEcrivain\Controler;
use \DateTime;

/**
 *
 */

class ControlerLecture extends Controleur
{
  private $episode;
  private $commentaire;

  // Constructeur
  public function __construct()
  {
    $this->episode = new \BlogEcrivain\Model\Episodes();
    $this->commentaire = new \BlogEcrivain\Model\Commentaire();
  }

  // Fonction d'affichage, par defaut.
  public function index()
  {
    $idEpisode = $this->requete->getParametre('id');
    $episodes = $this->episode->getEpisodes($idEpisode);
    $datePubliction = new DateTime($episodes[date_post]);
    $dateActuele = new DateTime();
    if($episodes === false || $datePubliction > $dateActuele){
      $this->pageIntrouvable();
    }
    if($episodes[publication] == 0){
      $this->pageIntrouvable();
    }
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
