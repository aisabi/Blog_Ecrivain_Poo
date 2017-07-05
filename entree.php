<?php 
ob_start();
//include_once ('_head_admin.php');
include_once ('_head_episodes.php');
include_once ('_menus.php');
?>
<?php
session_start();//démarre la session 
//echo "<a href=\"logout.php\">DeconnexionR</a>";
echo '</br>';
//echo "<a href=\"admin.php\">Retour Admin</a>"; 
?>
<?php
  /*Le cas session déjà ouverte*/
  if (isset($_SESSION["login"])) {
            //echo 'je suis le elseif';
            header("Location:http://localhost/admin.php");
                 }
   if (!isset($_SESSION["login"])){
 ?>
<div class="login_cr">
    <form action="" method="post">
    <fieldset>
     <legend>Accès sécurisé à l'administration </legend>
	<?php if(isset($_GET["erreur"]))
   		 echo "<p style=\"color:red; \">login ou mot de passe incorrect</p>";
?>
<label for ="login">Login :</label>
	<input type="text" name="login" id="login" placeholder="Entrez votre login" required/>
<label for="password">Mot de passe :</label>
	<input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
	<input type="submit" name="Envoyer" value="Envoyer"/>
</fieldset>
</form>

	</div>
<?php 
      /*Traitement du formulaire après envoi*/
        if(isset($_POST["Envoyer"])){
          /*le cas d'un utilisateur normal remplissage du $_SESSION["login"]  */ 
        /*Sécurise avec htmlspecialchars dans le cas d'un administrateur remplissage du $_SESSION["login"] , de $_SESSION["admin"] et redirection vers la page d'administration admin.php*/
           if (htmlspecialchars($_POST["login"]=="Jean") && htmlspecialchars($_POST["password"]=="hello123")){
                    $_SESSION["login"]="Jean Forteroche";
                    $_SESSION["admin"]=true;
                    header("Location:admin.php");
                  }
                  /*Le cas d'une erreur de login ou password*/
                  else {
                  	echo "Erreur ! Veuillez indiquer un login et mot de passe corrects.";
                     // header("Location:index.php?erreur=1");
                  }
             }

  }//FIN DE PHP ICI voir fichier
  include_once('_pied_de_page.php');
?>