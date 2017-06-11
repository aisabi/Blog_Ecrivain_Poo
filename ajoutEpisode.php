<?php 

if(isset($_POST['values']))
{

	$values = $_POST['values'];

	var_dump($_POST);
//classes episode et episodeManager
	include_once('episode.php');
    include_once('episodeManager.php');
//nouvel article (au lieu de mettre tous les setters on utilise hydrate pour l'alim)
    $episode = new Episode();
    $episode->hydrate($values);

// connexion à la bdd et ajout 
    $manager = new EpisodeManager();
    $manager->ajout($episode);

} 

//header('Location: episodes.php');
