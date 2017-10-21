<?php
function getEpisode(){

  global $bdd;

  $requete = $bdd->query('SELECT id_episode, titre, publication, date_post, DAY(date_post) AS jour, MONTH(date_post) AS mois, YEAR(date_post) AS annee FROM alk_episode WHERE publication = 1 ORDER BY date_post DESC');

  return $requete;
}
