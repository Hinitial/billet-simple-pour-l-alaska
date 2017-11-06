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
        $sql = 'SELECT id_commentaire, nom, post, DATE_FORMAT(date_post, "%d/%m/%Y %Hh%imin%ss") AS date_post, signalement, id_episode FROM alk_commentaire ORDER BY signalement DESC';
        $commentaire = $this->executeRequete($sql);
      }
    }
    else {
      $sql = 'SELECT id_commentaire, nom, post, date_post, signalement, id_episode FROM alk_commentaire WHERE id_commentaire = ?';
      $commentaire = $this->executeRequete($sql, array((int)$id_rechercher));
      $commentaire = $commentaire->fetch();
    }
    return $commentaire;
  }

  //Renvoie les épisodes publier, paramétrable
  public function getCommentaireArticle($id_article, $offset = null, $limit = null)
  {
    $commentaire;
    if ($offset !== null && $limit !== null) {
      $sql = 'SELECT id_commentaire, nom, post, date_post, signalement, id_episode FROM alk_commentaire WHERE id_episode = :id_article ORDER BY date_post LIMIT :_offset, :_limit';
      $commentaire = $this->executeRequete($sql, array('id_article' => ((int)$id_article), '_offset' => ((int)$offset), '_limit' => ((int)$limit) ));
    } else {
      $sql = 'SELECT id_commentaire, nom, post, DATE_FORMAT(date_post, "%d/%m %Hh%imin") AS date_post, signalement, id_episode FROM alk_commentaire WHERE id_episode = :id_article ORDER BY date_post';
      $commentaire = $this->executeRequete($sql, array('id_article' => ((int)$id_article) ));
    }
    return $commentaire;
  }

  // ----- Fonction Modicfiction BDD -----

  //Insertion d'une entré
  public function insertBdd($nom, $post, $id_episode)
  {
    $tab = array(
        'nom' => htmlspecialchars($nom),
        'post' => htmlspecialchars($post),
        'id_episode' => htmlspecialchars($id_episode));

    $sql = 'INSERT INTO alk_commentaire(nom, post, date_post, signalement, id_episode) VALUES(:nom, :post,  NOW(), 0, :id_episode )';
    $commentaire = $this->executeRequete($sql, $tab);
  }

  //Mets à jour une entré
  public function updateBDD($id, $post)
  {
    $tab = array(
        'id' => $id,
        'post' => $post);

    $sql = 'UPDATE alk_commentaire SET post = :post WHERE id_commentaire = :id';
    $commentaire = $this->executeRequete($sql, $tab);
  }

  //Mets à jour une entré
  public function signalementBDD($id)
  {
    $tab = array(
        'id' => $id);

    $sql = 'UPDATE alk_commentaire SET signalement = (signalement+1) WHERE id_commentaire = :id';
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
