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
$commentaire  = $manager->getCommentaires($idBillet);
//$test = $manager->test();
exit;
$comments  = $manager->getAllCommentaires();

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

  <h2>Vos Commentaires </h2>


<section id="list_episodes">
  <table class="table">
      <tr>    
        <th>Id</th>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Commentaires</th>
      </tr>

      <?php foreach ($comments as $comment): ?>
      <tr>
        <td><h3><?php echo $comment->getId();?></h3></td>
        <td><h3><?php echo $comment->getAuteur();?></h3></td>
        <td><h3><?php echo $comment->getDate_commentaire(); ?></h3></td>
        <td><p><?php echo substr ($comment->getCommentaire(),0,2000).'...'; ?></p></td>
        <td> <em><a href="commentaires.php?billeto=<?php echo $episode->getId(); ?>">Commentaires</a></em></td>

      </tr>
      <?php endforeach;?>



  <p>ici nn :
<?php 
  //$commentaires = new Commentaire();
  //$comment->truc();

  echo $commentaire->getId();
  echo $commentaire->getAuteur();
  echo $commentaire->getDate_commentaire();
  echo $commentaire->getCommentaire();

 ?></p>

    <p>Id : <?php //echo $commentaire->getId().'<br/>'; ?></p>


<p>Test auteur : <?php// var_dump($commentaire->getAuteur())?></p>


<section id="list_episodes">
  <table class="table">
      <tr>    
        <th>Id</th>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Commentaires</th>
      </tr>

<?php ob_start(); ?>
<?php foreach ($commentaires as $commentaire): ?>
  <div class="commentaires"><strong><p id="commentaires"><?= $commentaire->getId() ?></strong> le : 
    <?= $commentaire->getAuteur() ?> dit :</p>
<p>Test auteur : <?php var_dump($commentaire->getAuteur())?></p>
  <?= $commentaire['date_commentaire_fr'] ?> dit :</p>
  <p><?= $commentaire['commentaire'] ?></p>   
   
    <a id="show" href="signaler.php?billeto=<?php echo $commentaire['id']; ?>" class="btn btn-warning" role="button" style="margin-left:92em;margin-top: -1em;" .btn-sm onclick="ciao">Signaler</a>
    <p id="texte_merci">If you click on the "Hide" button, I will disappear.</p>
    <hr>
  </div>
<?php endforeach; ?>
<?php $contenu2 = ob_get_clean(); ?>
 </table>
 </section>

          <?php echo $contenu2 ?> 


<section id="commentaire_section">
      <?php include_once ('_form_commentaire.php'); ?>
</section>   
<hr>
  
</div>


    <?php include("_pied_de_page.php");?>
  





