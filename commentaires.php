<?php
  include_once ('_head_episodes.php');
  include_once("_menus.php"); 

  include_once ('episode.php');
  include_once ('episodeManager.php');
    include_once ('commentaire.php');

  include_once ('commentaireManager.php');

$idBillet = $_GET['billeto'];

$manager = new EpisodeManager();
$episode  = $manager->getEpisode();

$manager = new CommentaireManager();
$commentaires  = $manager->getCommentaires($idBillet);

?>

 <p style="font-weight:bold; margin-left:1em;margin-top: 1em;"><a button type="button" class="btn btn-primary active" href='episodes.php'> Retour à la liste des épisodes</a></p>
  <h1>L'article et vos commentaires !</h1>

    <div class="news">
    <h3>         
     <p>Id : <?php echo $episode->getId().'<br/>'; ?></p>
     <p>Auteur : <?php echo $episode->getAuteur().'<br/>'; ?></p>
     <p>Titre : <?php echo $episode->getTitre().'<br/>'; ?></p>
    </h3>
      <p><?php echo $episode->getContenu(); ?></p>
  </div>
  <hr>


<?php ob_start(); ?>
<?php foreach ($commentaires as $commentaire): ?>
  <div class="commentaires"><strong><p id="commentaires"><?= $commentaire['auteur'] ?></strong> le : 
  <?= $commentaire['date_commentaire_fr'] ?> dit :</p>
  <p><?= $commentaire['commentaire'] ?></p>   
    <!--<input type="submit" class="btn btn-warning" style="margin-left:92em;margin-top: -1em;" .btn-sm value="Signaler">-->

    <a id="show" href="signaler.php?billeto=<?php echo $commentaire['id']; ?>" class="btn btn-warning" role="button" style="margin-left:92em;margin-top: -1em;" .btn-sm onclick="ciao">Signaler</a>
    <p id="texte_merci">If you click on the "Hide" button, I will disappear.</p>

    
    <hr>
  </div>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

  <h2>Vos Commentaires </h2>

          <?php echo $contenu ?> 

    <p>Id : <?php //echo $commentaire->getId().'<br/>'; ?></p>

<section id="commentaire_section">
      <?php include_once ('_form_commentaire.php'); ?>
</section>   
<hr>
  
</div>


    <?php include("_pied_de_page.php");?>
  





