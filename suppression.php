<?php 

//include_once ('_config.php');
//include_once ('episode.php');
include_once ('episodeManager.php');

//définition de $id
if($episode_id = $_GET['episode_id'])
{
    echo 'hello delete ! ';
   $manager = new EpisodeManager();
  $manager->supprimerEpisode($episode_id);
}

// redirection to prevent from a refresh
//header('Location: list.php');
/*
if($book_id = $_GET['book_id'])
{
    $manager = new BookManager();
    $manager->deleteById($book_id);
}

// redirection to prevent from a refresh
header('Location: list.php');
*/