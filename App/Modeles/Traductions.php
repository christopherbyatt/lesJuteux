<?php

namespace App\Modeles;

use App\App;

class Traductions
{
    private int $id = 0;
    private string $traduit_en = "";
    private string $traduit_de = "";
    private string $traduit_par = "";
    private int $livre_id = 0;

    public function __construct(){}

    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM traductions';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Traduction");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $traduction = $requetePreparee->fetchAll();
        return $traduction;

    }
    public function getIdTrad():int{
        return $this->id;
    }
}