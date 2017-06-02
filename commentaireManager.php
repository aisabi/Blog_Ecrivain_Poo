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
 //liste commentaires

 public function getCommentaires($idBillet) {
    //$bdd = getBdd();
    $bdd = $this->bdd;

    $commentaires = $bdd->prepare('SELECT id, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr,auteur, commentaire FROM commentaires WHERE id_billet= ? ORDER BY date_commentaire');
    $commentaires->execute(array($idBillet));
    $donnees = $commentaires->fetch();

    $commentaire = new Commentaire();
  //  $commentaire->setId($donnees['id']);

 /*   $commentaire = new Commentaire();
    $commentaire->setId($new['id']);
    $episode->setAuteur($new['auteur']); 
    $episode->setTitre($new['titre']);
    $episode->setContenu($new['contenu']);
    //Données placées dans un tableau d'objet 
    $episodes[] = $episode; */
    return $commentaires;
  } 




  

}
