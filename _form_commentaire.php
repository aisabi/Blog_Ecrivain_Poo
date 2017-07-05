<!-- Formulaire d'ajout d'un commentaire -->

<form  action="ajoutCommentaire.php" method="post">
       <input id="auteur" name="values[auteur]" type="text" placeholder="Votre pseudo" required /><br />
       <textarea id="txtCommentaire" name="values[commentaire]" rows="4"
                  placeholder="Votre commentaire" required></textarea><br/>
        <input type="" name="values[id_billet]" value="<?= $_GET['billeto'] ?>" />  
       <input id = "commenter" type="submit" value="Commenter" />
</form>

