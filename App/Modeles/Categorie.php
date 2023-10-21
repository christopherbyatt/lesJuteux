<?php

namespace App\Modeles;

use App\App;

class Categorie
{
    private int $id = 0;
    private string $nom = "";
    public function __construct(){
    }

    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM categories';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Categories");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $categories = $requetePreparee->fetchAll();
        return $categories;
    }
    public function getIdCategorie():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
}