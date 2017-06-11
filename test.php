<?php
include_once ('episode.php');
 //echo "he";
include_once ('commentaire.php');

$article = new Episode();

$article->setAuteur("PAUL");

echo $article->getAuteur();

$commentaire = new Commentaire("bah alors super commentaire");

$commentaire->setCommentaire("ceci est un commentaire");

echo $commentaire->getCommentaire();

//$commentaire->commentaire;

$talk = new Commentaire("gros blabla");

echo $talk->getCommentaire();

var_dump(''.$talk->getCommentaire());
//echo "Tell me private stuff: ".$talk->$auteur;  

$datehisto = new Commentaire();
$datehisto->setDate_commentaire("23-05-2017");
echo $datehisto->getDate_commentaire();


