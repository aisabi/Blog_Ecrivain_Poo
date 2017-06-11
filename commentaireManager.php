<?php 

class CommentaireManager {


    protected $bdd;
    private $host      = "localhost";
    private $login     = "root";
    private $mdp       = "root";

    public function __construct()
    {
        $bdd = new PDO('mysql:host='.$this->host.';dbname=systeme_news;charset=utf8', $this->login, $this->mdp);
        $this->bdd = $bdd;
    }

 public function test(){
  echo 'je suis le comm manager';
 }   
 //liste commentaires

 public function getCommentaires($idBillet) {
    //$bdd = getBdd();
    $bdd = $this->bdd;
    
    $commentaires = $bdd->prepare('SELECT id, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr,auteur, commentaire FROM commentaires WHERE id_billet= ? ORDER BY date_commentaire');
    $commentaires->execute(array($idBillet));
   // $donnees = $commentaires->fetchAll();
   
    //echo '<pre>'; print_r($donnees);
  
   while ($donnees = $commentaires->fetchAll()){
    //$donnees = $commentaires->fetchAll();
    echo '<pre>'; print_r($donnees);
   //   $commentaire = new Commentaire();
    //  $commentaire->setId($donnees['id']); 
    //  $commentaire->setDate_commentaire($donnees['date_commentaire_fr']);
    //  $commentaire->setAuteur($donnees['auteur']);
   //   $commentaire->setCommentaire($donnees['commentaire']);
    
    //$commentaires[] = $commentaire;

  //}
    // return $commentaire; 
}

}


public function getAllCommentaires(){ 
  $bdd = $this->bdd;
  $requete = "SELECT * FROM commentaires ORDER BY id desc LIMIT 0, 15";//id, auteur, titre, contenu 
  $req = $bdd->prepare($requete);
  $req->execute();
  $donnees = $req->fetch();
  echo 'données'.'<pre>';print_r($donnees);
  
  while($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
// création d'une instance d'objet épisode
    
    $comment = new commentaire();
    $comment->setId($donnees['id']);
    $comment->setDate_commentaire($donnees['date_commentaire']); 
    $comment->setAuteur($donnees['auteur']);
    $comment->setCommentaire($donnees['commentaire']);
    //Données placées dans un tableau d'objet 
    $comments[] = $comment;
  }
  return $comments;

 }


}