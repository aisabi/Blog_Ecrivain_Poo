<?php 
include_once ('_head_episodes.php');
include_once("_menus.php");

include_once ('episode.php');
include_once ('episodeManager.php');

$manager = new EpisodeManager();
$episodes  = $manager->getEpisodes();

?>  

<section id="list_episodes">
  <table class="table">
      <tr>    
        <th>Id</th>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Commentaires</th>
      </tr>

      <?php foreach ($episodes as $episode): ?>
      <tr>
        <td><h3><?php echo $episode->getId();?></h3></td>
        <td><h3><?php echo $episode->getAuteur();?></h3></td>
        <td><h3><?php echo $episode->getTitre(); ?></h3></td>
        <td><p><?php echo substr ($episode->getContenu(),0,200).'...'; ?></p></td>
        <td> <em><a href="commentaires.php?billeto=<?php echo $episode->getId(); ?>">Commentaires</a></em></td>

      </tr>
      <?php endforeach;?>
   </table>
 </section>

      </div>
      <?php include ("_pied_de_page.php");?>  
