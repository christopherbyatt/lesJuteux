<?php

namespace App\Modeles;

use App\App;
use \PDO;

class Categorie
{
    private int $id = 0;
    private string $nom = "";
    public function __construct(){
    }

    public static function trouverTout():array{
        $chaineSQL = "SELECT * FROM categories";
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Categorie");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $categories = $requetePreparee->fetchAll();
        return $categories;
    }

    public static function trouverParId(int $unIdCategorie):Categorie{
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM categories WHERE id=:idCategorie';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);

        // BindParam
        $requetePreparee->bindParam('idCategorie', $unIdCategorie);
        // Définir le mode de récupération

        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Categorie");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $categorie = $requetePreparee->fetch();

        return $categorie;
    }


    public function getId():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
}