<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
require_once 'Model/Modele.php';

class Episodes extends Modele
{
  //Renvoie les épisodes
  public function getEpisodes($id_rechercher = null, $offset = null, $limit = null)
  {
    $episode;
    if ($id_rechercher === null) {
      if ($offset !== null && $limit !== null) {
        $sql = 'SELECT id_episode, titre, post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode ORDER BY id_episode DESC LIMIT ?, ?';
        $episode = $this->executeRequete($sql, array($offset, $limit));
      } else {
        $sql = 'SELECT id_episode, titre, post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode ORDER BY id_episode DESC';
        $episode = $this->executeRequete($sql);
      }
    }
    else {
      $sql = 'SELECT id_episode, titre, post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE id_episode = ?';
      $episode = $this->executeRequete($sql, array($id_rechercher));
      $episode = $episode->fetch();
    }
    return $episode;
  }

  //Renvoie les épisodes publier, paramétrable
  public function getEpisodesPublier($id_rechercher = null, $offset = null, $limit = null)
  {
    $episode;
    if ($id_rechercher === null) {
      if ($offset !== null && $limit !== null) {
        $sql = 'SELECT id_episode, titre, post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE publication = 1 ORDER BY date_post DESC LIMIT :_offset, :_limit';
        $episode = $this->executeRequete($sql, array('_offset' => ((int)$offset), '_limit' => ((int)$limit) ));
      } else {
        $sql = 'SELECT id_episode, titre, post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE publication = 1 ORDER BY date_post DESC';
        $episode = $this->executeRequete($sql);
      }
    }
    else {
      $sql = 'SELECT id_episode, titre, post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE publication = 1 AND id_episode = ?';
      $episode = $this->executeRequete($sql, array($id_rechercher));
      $episode = $episode->fetch();
    }
    return $episode;
  }

  //Renvoie les debut des épisodes
  public function getEpisodesExtrait($tailleExtrait, $offset = null, $limit = null)
  {
    $episode;
    if ($offset !== null && $limit !== null) {
      $sql = 'SELECT id_episode, titre, SUBSTR(post, 1, :taille) AS post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE publication = 1 ORDER BY id_episode DESC LIMIT :_offset, :_limit';
      $episode = $this->executeRequete($sql, array('taille' => ((int)$tailleExtrait), '_offset' => ((int)$offset), '_limit' => ((int)$limit) ));
    } else {
      $sql = 'SELECT id_episode, titre, SUBSTR(post, 1, ?) AS post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE publication = 1 ORDER BY id_episode DESC';
      $episode = $this->executeRequete($sql, array($tailleExtrait));
    }
    return $episode;
  }

  //Renvoie les debut des épisodes
  public function getEpisodesAccueil()
  {
    $sql = 'SELECT id_episode, titre, SUBSTR(post, 1, 250) AS post, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE publication = 1 ORDER BY id_episode DESC LIMIT 0, 2';
    $episode = $this->executeRequete($sql);
    return $episode;
  }

  // ----- Fonction Modicfiction BDD -----

  //Insertion d'une entré
  public function insertBdd($titre, $post, $publication, $date_post)
  {
    $tab = array(
        'titre' => $titre,
        'post' => $post,
        'publication' => $publication,
        'date_post' => $date_post);

    $sql = 'INSERT INTO alk_episode(titre, post, publication, date_post, date_modification) VALUES(:titre, :post, :publication, :date_post, NOW() )';
    $episode = $this->executeRequete($sql, $tab);
  }

  //Mets à jour une entré
  public function updateBDD($id, $titre, $post, $publication, $date_post)
  {
    $tab = array(
        'id' => $id,
        'titre' => $titre,
        'post' => $post,
        'publication' => $publication,
        'date_post' => $date_post);

    $sql = 'UPDATE alk_episode SET titre = :titre, post = :post, publication = :publication, date_post = :date_post, date_modification = NOW() WHERE id_episode = :id';
    $episode = $this->executeRequete($sql, $tab);
  }

  //Supprime une entré
  public function deleteBDD($id)
  {
    $tab = array('id' => $id);

    $sql = 'DELETE FROM alk_episode WHERE id_episode = :id';
    $episode = $this->executeRequete($sql, $tab);
  }
}

 ?>
