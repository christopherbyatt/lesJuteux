<?php

namespace App\Modeles;

use App\App;
use \PDO;
class Type_impression
{
    private int $id = 0;
    private string $nom = "";
    public function __construct(){
    }

    public static function trouverParId(int $unIdImpression){
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM type_impression WHERE id=:idImpression';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        // BindParam
        $requetePreparee->bindParam('idImpression', $unIdImpression);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Type_impression");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $impression = $requetePreparee->fetch();

        return $impression;
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