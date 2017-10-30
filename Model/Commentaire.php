<?php
//namespace BilletSimpleAlaska;
/**
 *
 */
require_once 'Model/Modele.php';

class Commentaire extends Modele
{
  //Renvoie les épisodes
  public function getCommentaire($id_rechercher = null, $offset = null, $limit = null)
  {
    $commentaire;
    if ($id_rechercher === null) {
      if ($offset !== null && $limit !== null) {
        $sql = 'SELECT id_commentaire, nom, post, date_post, signalement, id_episode FROM alk_commentaire ORDER BY signalement DESC LIMIT ?, ?';
        $commentaire = $this->executeRequete($sql, array($offset, $limit));
      } else {
        $sql = 'SELECT id_commentaire, nom, post, date_post, signalement, id_episode FROM alk_commentaire ORDER BY signalement';
        $commentaire = $this->executeRequete($sql);
      }
    }
    else {
      $sql = 'SELECT id_commentaire, nom, post, date_post, signalement, id_episode FROM alk_commentaire WHERE id_commentaire = ?';
      $commentaire = $this->executeRequete($sql, array($id_rechercher));
      $commentaire = $commentaire->fetch();
    }
    return $commentaire;
  }

  //Renvoie les épisodes publier, paramétrable
  public function getCommentaireArticle($id_article, $offset = null, $limit = null)
  {
    $commentaire;
    if ($offset !== null && $limit !== null) {
      $sql = 'SELECT id_commentaire, nom, post, date_post, signalement, id_episode FROM alk_commentaire ORDER BY signalement WHERE id_episode = :id_article ORDER BY date_post DESC LIMIT :_offset, :_limit';
      $commentaire = $this->executeRequete($sql, array('id_article' => $id_article, '_offset' => ((int)$offset), '_limit' => ((int)$limit) ));
    } else {
      $sql = 'SELECT id_commentaire, nom, post, date_post, signalement, id_episode FROM alk_commentaire ORDER BY signalement WHERE id_episode = :id_article ORDER BY date_post DESC';
      $commentaire = $this->executeRequete($sql, array('id_article' => $id_article ));
    }
    return $commentaire;
  }

  // ----- Fonction Modicfiction BDD -----

  //Insertion d'une entré
  public function insertBdd($nom, $post, $id_episode)
  {
    $tab = array(
        'titre' => $titre,
        'post' => $post,
        'id_episode' => $id_episode);

    $sql = 'INSERT INTO alk_episode(nom, post, date_post, signalement, id_episode) VALUES(:titre, :post,  NOW(), 0, :id_episode )';
    $commentaire = $this->executeRequete($sql, $tab);
  }

  //Supprime une entré
  public function deleteBDD($id)
  {
    $tab = array('id' => $id);

    $sql = 'DELETE FROM alk_commentaire WHERE id_commentaire = :id';
    $commentaire = $this->executeRequete($sql, $tab);
  }
}
