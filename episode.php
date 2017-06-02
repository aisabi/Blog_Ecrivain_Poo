<?php

class Episode {
    protected $id = null;
    protected $auteur;
    protected $titre;
    protected $contenu;


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

    public function setTitre($titre) {
        $this->titre = $titre;
    }
    public function getTitre() {
        return $this->titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        //return $this->description;
        echo $this->description;
    }


    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function getContenu() {
        return $this->contenu;
    }

}