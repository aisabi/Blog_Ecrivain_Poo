<?php 
//echo 'hello je suis ajout commentaire';

if(isset($_POST['values']))
{

	$values = $_POST['values'];

	var_dump($_POST);
//classes commentaire et commentaireManager

include_once('commentaire.php');
include_once('commentaireManager.php');

$comment = new Commentaire();
$comment->hydrate($values);

$manager = new CommentaireManager();
$manager->ajoutCommentaire($comment);

}