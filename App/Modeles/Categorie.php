<?php

namespace App\Modeles;

use App\App;
use \PDO;

class Categorie
{
    private int $id = 0;
    private string $nom = "";
    private string $isbn_papier = '';
    private string $isbn_pdf = '';
    private string $isbn_epub = '';
    private $url_audio = '';
    private string $titre = '';
    private string $le_livre = '';
    private string $arguments_commerciaux = '';
    private string $statut = '';
    private string $pagination = '';
    private string $age_min = '';
    private string $format = '';
    private string $tirage = '';
    private string $prix_can = '';
    private string $prix_euro = '';
    private string $date_parution_quebec = '';
    private string $date_parution_france = '';
    private string $categorie_id = '';
    private $type_impression_id = 0;
    private $type_couverture_id = 0;
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

    public static function trouverParLivre(int $idLivre):array
    {
        $chaineSQL = 'SELECT * FROM Categories 
         INNER JOIN livres ON livres.categorie_id = categories.id
         WHERE livres.categorie_id = :idLivre';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam('idLivre', $idLivre);
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Categorie");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat

        $categorie = $requetePreparee->fetch();
        return $categorie;
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

        $categorieId = $requetePreparee->fetchAll();
        return $categorieId;
    }

        $categorie = $requetePreparee->fetch();

        return $categorie;
    }


    public function getIdCategorie():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
}