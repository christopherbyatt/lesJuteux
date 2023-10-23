<?php

namespace App\Modeles;

use App\App;

class Evenement
{
    private int $id = 0;
    private string $titre = "";
    private string $l_evenement = "";
    private string $date = "";
    private int $galerie_boutique = 0;
    private string $lien_facebook = "";
    private string $lien_instagram = "";

    public function __construct(){
    }
    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM evenements';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Evenement");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $evenements = $requetePreparee->fetchAll();
        return $evenements;
    }
    public function getIdEvenement():int{
        return $this->id;
    }
    public function getTitre():string{
        return $this->titre;
    }
    public function getLEvenement():string{
        return $this->l_evenement;
    }
    public function getDate():string{
        return $this->date;
    }
    public function getGalerieBoutique():int{
        return $this->galerie_boutique;
    }
    public function getLienFacebook():string{
        return $this->lien_facebook;
    }
    public function getLienInstagram():string{
        return $this->lien_instagram;
    }
}