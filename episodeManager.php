<?php 

class EpisodeManager {

    protected $bdd;
    private $host      = "localhost";
    private $login     = "root";
    private $mdp       = "root";

    public function __construct()
    {
        $bdd = new PDO('mysql:host='.$this->host.';dbname=systeme_news;charset=utf8', $this->login, $this->mdp);
        $this->bdd = $bdd;
    }
 //liste épisodes
  public function getEpisodes(){ 
	$bdd = $this->bdd;
	$requete = "SELECT * FROM news ORDER BY id desc LIMIT 0, 5";//id, auteur, titre, contenu 
	$req = $bdd->prepare($requete);
	$req->execute();
	while($new = $req->fetch(PDO::FETCH_ASSOC)) {
// création d'une instance d'objet épisode
    
    $episode = new Episode();
    $episode->setId($new['id']);
    $episode->setAuteur($new['auteur']); 
    $episode->setTitre($new['titre']);
    $episode->setContenu($new['contenu']);
    //Données placées dans un tableau d'objet 
    $episodes[] = $episode;
 	}
 	return $episodes;
 }
//un seul épisode
  public function getEpisode(){
 
  $bdd = $this->bdd;
  $req = $bdd->prepare('SELECT id, auteur, titre, contenu FROM news WHERE id = ?');
  $req->execute(array($_GET['billeto']));
  $donnees = $req->fetch();
    $episode = new Episode();
    $episode->setId($donnees['id']);
    $episode->setAuteur($donnees['auteur']); 
    $episode->setTitre($donnees['titre']);
    $episode->setContenu($donnees['contenu']);
    //$episodes[] = $episode;
     	return $episode;

  }

}

