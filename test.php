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

//---------EXEMPLE FOREACH DANS UN TABLEAU
?>
<section id="list_episodes">
  <table class="table">
      <tr>    
        <th>Id1</th>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Contenu</th>
      </tr>
<?//ici le $commentaires avec SSS est la variable $commentaires  = $manager->getCommentaires($idBillet); cette variable est récupérer via le manager  ?>
      <?php foreach ($commentaires as $com): ?>
      <tr>
        <td><h3><?php echo $com->getId();?></h3></td>
        <td><h3><?php echo $com->getAuteur();?></h3></td>
        <td><h3><?php echo $com->getDate_commentaire(); ?></h3></td>
        <td><p><?php echo substr ($com->getCommentaire(),0,2000).'...'; ?></p></td>
      </tr>
      <?php endforeach;?>





<!-- <input type="hidden" name="id" value="<?=// $_GET['billeto'] ?>" />   -->
