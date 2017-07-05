<?php
  include_once ('_head_episodes.php');
  include_once("_menus.php"); 

  include_once ('episode.php');//classe episode
  include_once ('episodeManager.php');
  include_once ('commentaire.php');// classe commentaire

  include_once ('commentaireManager.php');

$idBillet = $_GET['billeto'];

$manager = new EpisodeManager();
$episode  = $manager->getEpisode();

$manager = new CommentaireManager();
$commentaires  = $manager->getCommentaires($idBillet);
//echo '<pre>'; print_r($commentaires);
//$test = $manager->test();
//exit;
$comments  = $manager->getAllCommentaires();

?>

 <p id="btRetour">
    <a type="button" class="btn btn-primary active" href='episodes.php'> Retour à la liste des épisodes
    </a>
 </p>

  <h1>L'article et vos commentaires !</h1>

    <div class="news">
        <h3>         
           <p>
              Id : <?php echo $episode->getId();?>
              <br/>
           </p>
           <p>
              Auteur : <?php echo $episode->getAuteur();?>
              <br/>
           </p>
           <p>
              Titre : <?php echo $episode->getTitre();?>
              <br/>
          </p>
        </h3>
      <p><?php echo $episode->getContenu(); ?></p>
  </div>
  <hr>

  <h2>Vos Commentaires </h2>

<?php ob_start(); ?>

<?php if ($commentaires):?>
<?php foreach ($commentaires as $com): ?>
  <div class="commentaires">
      <p id="commentaires">
      <strong><?= $com->getId() ?> </strong>    
      <strong><?= $com->getAuteur() ?></strong> le :
              <?= $com->getDate_commentaire(); ?> dit :
      </p> 
      <?php echo $com->getCommentaire(); ?>
    <hr/>
  </div>
<?php endforeach;?>
<?php else: ?> 
  PAS DE COMMENTAIRES
<?php endif; ?>

<?php $contenu2 = ob_get_clean(); ?>

<?php echo $contenu2 ?> 

<section id="commentaire_section">
      <?php include_once ('_form_commentaire.php'); ?>
</section>   
<hr/>
  
<?php include("_pied_de_page.php");?>
  





