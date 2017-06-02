<form method="post" action="ajoutCommentaire.php">
       <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /><br />
       <textarea id="txtCommentaire" name="commentaire" rows="4" 
                  placeholder="Votre commentaire" required></textarea><br/>
       <input type="hidden" name="id" value="<?= $_GET['billeto'] ?>" /> 
       <input id = "commenter" type="submit" value="Commenter" name="submit_commentaire"/>
</form>