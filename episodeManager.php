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
	$requete = "SELECT * FROM news ORDER BY id desc LIMIT 0, 10";//id, auteur, titre, contenu 
	$req = $bdd->prepare($requete);
	$req->execute();
  //$new = $req->fetch();
  //echo'<pre>';print_r($new);
  
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

  //$new = $req->fetch();
  //echo'<pre>';print_r($donnees);
  
    $episode = new Episode();
    $episode->setId($donnees['id']);
    $episode->setAuteur($donnees['auteur']); 
    $episode->setTitre($donnees['titre']);
    $episode->setContenu($donnees['contenu']);
    //$episodes[] = $episode;
     	return $episode;
      

  }

    public function getListe(){ 
  $bdd = $this->bdd;
  $requete = "SELECT * FROM news ORDER BY id desc";//id, auteur, titre, contenu 
  $req = $bdd->prepare($requete);
  $req->execute();
  //$new = $req->fetch();
  //echo'<pre>';print_r($new);
  
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
//paramètres : la classe Episode et la variable $episode car = new Episode
 public function ajout(Episode $episode){
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
 }


public function supprimerEpisode($episode_id)
    {
        $bdd = $this->bdd;
        $req = $bdd->prepare("DELETE FROM news WHERE id = ".$episode_id);
        $req->execute();
    }




}

