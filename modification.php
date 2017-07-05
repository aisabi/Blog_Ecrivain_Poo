<?php   
    include_once ('_head_admin.php');

    echo 'modification';
?>

<p style="font-weight:bold; margin-left:3em;margin-top: 1em;"><a button type="button" class="btn btn-primary active" href='.'>Accéder à l'accueil du site</a></p>

    <form action="#" method="post">
    	   <p style="text-align: center">
    	    Auteur:<input type="text" name="auteur" size="20" value="<?php ?>"/><br/>
    	    Titre : <input type="text" name="titre" size="30" value="<?php  ?>" /><br/>
    	           
           Contenu :<br/><textarea rows="10" cols="60" name="contenu"> <?php ?></textarea>
    <br/>
    			<input id = "valider" type="submit" value="Valider" />
         <!-- $("valider").click(function(){"La modification a été effectuée !"
          }); -->
    			<input type="reset" value="Effacer le formulaire" />
    		</p>
    </form>
	</body>
</html>

<?php 
$bdd = new PDO('mysql:host=localhost;dbname=systeme_news', 'root', 'root');
$tit = $_POST['titre'];