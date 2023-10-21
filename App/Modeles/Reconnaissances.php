<?php

namespace App\Modeles;

use App\App;

class Reconnaissances
{
    private int $id = 0;
    private string $la_reconnaissance = "";
    private int $livre_id = 0;

    public function __construct(){}

    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM reconnaissances';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Reconnaissances");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $reconnaissances = $requetePreparee->fetchAll();
        return $reconnaissances;
    }
    public function getIdRecon():int{
        return $this->id;
    }
    public function getLaReconnaissance():string{
        return $this->la_reconnaissance;
    }
    public function getLivreId():string{
        return $this->livre_id;
    }
}