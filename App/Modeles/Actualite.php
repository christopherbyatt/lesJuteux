<?php

namespace App\Modeles;
use App\App;
use \PDO;
class Actualite
{
    private int $id = 0;
    private string $titre = "";
    private string $l_actualite = "";
    private string $date = "";
    private string $lien_facebook = "";
    private string $lien_instagram = "";


    public function __construct(){
    }
    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM actualites';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Actualite");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $actualites = $requetePreparee->fetchAll();
        return $actualites;
    }
    public function getIdActu():int{
        return $this->id;
    }
    public function getTitre():string{
        return $this->titre;
    }
    public function getLActualite():string{
        return $this->l_actualite;
    }
    public function getDate():string{
        return $this->date;
    }
    public function getLienFacebook():string{
        return $this->lien_facebook;
    }
    public function getLienInstagram():string{
        return $this->lien_instagram;
    }
}