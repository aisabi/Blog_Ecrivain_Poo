bonjour je suis l'administrateur ! 

 <?php   include_once ('_head_admin.php');
 include_once ('episode.php');
 include_once ('episodeManager.php');
$manager = new EpisodeManager();
$episodes  = $manager->getListe();
?>
  <p style="font-weight:bold; margin-left:3em;margin-top: 1em;"><a button type="button" class="btn btn-primary active" href='.'>Accéder à l'accueil du site</a></p>
<!-- Formulaire d'ajout d'un article-->
<form action="ajoutEpisode.php" method="post">
      <p style="text-align: center">
      Auteur:<input type="text" name="values[auteur]" size="20"/><br/> 
      Titre:<input type="text" name="values[titre]" size="30"/><br/> 
          Contenu :<br /><textarea rows="10" cols="60" 
			name="values[contenu]"><?php ?></textarea><br />

      <input type="submit" value="Valider" />
      <input type="reset" value="Effacer le formulaire" /> 
    </p>
  </form>
  <p style="text-align: center">Liste des épisodes A : </p> 

<div class="container-fluid"> 
<section id="list_episodes">
  <table class="table">
      <tr>    
        <th>Id</th>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Modifier</th>
        <th>Delete</th>
      </tr>

      <?php foreach ($episodes as $episode): ?>
      <tr>
        <td><h3><?php echo $episode->getId();?></h3></td>
        <td><h3><?php echo $episode->getAuteur();?></h3></td>
        <td><h3><?php echo $episode->getTitre(); ?></h3></td>
        <td><p><?php echo substr ($episode->getContenu(),0,200).'...'; ?></p></td>
        <td><a href="modification.php?id=<?php echo $episode->getId(); ?>">modifier</td>
            <td><a href="suppression.php?episode_id=<?php echo $episode->getId(); ?>">supprimer</td> 

      </tr>
      <?php endforeach;?>
   </table>
 </section>
 </div>
   </body>
</html>