<?php

namespace App\Modeles;

use App\App;
use \PDO;
class Type_couverture
{
    private int $id = 0;
    private string $nom = "";
    public function __construct(){
    }

    public static function trouverParId(int $unIdCouverture){
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM categories WHERE id=:idCouverture';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        // BindParam
        $requetePreparee->bindParam('idCouverture', $unIdCouverture);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Type_couverture");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $couverture = $requetePreparee->fetch();

        return $couverture;
    }
    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM type_couverture';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Type_couverture");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $couvertures = $requetePreparee->fetchAll();
        return $couvertures;
    }
    public function getIdCouverture():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
}