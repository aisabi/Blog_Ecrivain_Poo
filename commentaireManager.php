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
    
    $request = $bdd->prepare('SELECT id, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr,auteur, commentaire FROM commentaires WHERE id_billet= ? ORDER BY date_commentaire');
    $request->execute(array($idBillet));
   // $donnees = $commentaires->fetchAll();
   
    //echo '<pre>'; print_r($donnees);
  
   while ($result = $request->fetch()){
    //$donnees = $commentaires->fetchAll();
   // echo '<pre>'; print_r($result);
    $commentaire = new Commentaire();
     $commentaire->setId($result['id']); 
     $commentaire->setDate_commentaire($result['date_commentaire_fr']);
     $commentaire->setAuteur($result['auteur']);
     $commentaire->setCommentaire($result['commentaire']);
    
    $commentaires[] = $commentaire;

  }
if(!isset($commentaires)) return null;
     return $commentaires; 
}


public function getAllCommentaires(){ 
  $bdd = $this->bdd;
  $requete = "SELECT * FROM commentaires ORDER BY id desc LIMIT 0, 15";//id, auteur, titre, contenu 
  $req = $bdd->prepare($requete);
  $req->execute();
  $donnees = $req->fetch();
  //echo 'données'.'<pre>';print_r($donnees);
  
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

/* public function ajoutCommentaire(Commentaire $comment){
echo 'ça marche';
$bdd = $this->bdd;
        $req = $bdd->prepare("INSERT INTO news (auteur, titre,contenu) VALUES (:auteur, :titre, :contenu)");
        $req->execute(
            array(
                'auteur'       => $episode->getAuteur(),
                'titre' => $episode->getTitre(),
                'contenu'      => $episode->getContenu()
            )
        );
        return $this;
 }*/


 public function ajoutCommentaire(Commentaire $comment){
echo 'ça marche';
/*$bdd = $this->bdd;
        $req = $bdd->prepare('INSERT INTO commentaires (id_billet,auteur, commentaire) VALUES (:id_billet, :auteur, :commentaire)');
        $req->execute(
            array(
                'id_billet'   => $commentaire->getId_billet(),
                'auteur'      => $commentaire->getAuteur(),
                'commentaire' => $commentaire->getCommentaire(),
                //'contenu'      => $commentaire->getContenu()
            )
        );
        return $this;*/

        $bdd = $this->bdd;
        $req = $bdd->prepare("INSERT INTO commentaires (id_billet,auteur, date_commentaire,commentaire) VALUES (:id_billet,:auteur, NOW(), :commentaire)");
        $req->execute(
            array(
              'id_billet'       => $comment->getId_billet(),
                'auteur'       => $comment->getAuteur(),
              //  'titre' => $comment->getTitre(),
                'commentaire'      => $comment->getCommentaire()
            )
        );
        return $this;
 }

}
