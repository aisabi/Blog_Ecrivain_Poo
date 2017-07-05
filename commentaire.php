<?php 

class Commentaire {
   
    protected $id = null;
    protected $auteur;
    protected $commentaire;
    protected $date_commentaire;
    protected $id_billet;



 /*function __construct($blabla){
	$this->commentaire = $blabla;
}*/

    public function hydrate(Array $values)
        {
            foreach ($values as $key=>$value)
            {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        } 

public function get_date_commentaire(){
	return $this->date_commentaire;
}

 //id 	id_billet 	auteur 	commentaire 	date_commentaire 	signaler_com
 //id, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr,auteur, commentaire 
//id, auteur,titre, contenu FROM news 

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
   
    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }
    public function getAuteur() {
        return $this->auteur;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setDate_commentaire($date_commentaire) {
        $this->date_commentaire = $date_commentaire;
    }

    public function getDate_commentaire() {
        //return $this->description;
        return $this->date_commentaire;
    }


    public function setId_billet($id_billet) {
        $this->id_billet = $id_billet;
    }

    public function getId_billet() {
        return $this->id_billet;
    }

}


