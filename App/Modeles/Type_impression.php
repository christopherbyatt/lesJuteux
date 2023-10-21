<?php

namespace App\Modeles;

use App\App;

class Type_impression
{
    private int $id = 0;
    private string $nom = "";
    public function __construct(){
    }
    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM type_impression';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Type_impression");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $impressions = $requetePreparee->fetchAll();
        return $impressions;
    }
    public function getIdImpression():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
}