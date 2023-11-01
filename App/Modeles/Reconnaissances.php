<?php

namespace App\Modeles;

use App\App;
use \PDO;
class Reconnaissances
{
    private int $id = 0;
    private string $la_reconnaissance = "";
    private int $livre_id = 0;
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
    public static function trouverParLivre(int $idLivre):array{
        $chaineSQL = 'SELECT * FROM reconnaissances 
    INNER JOIN livres on livres.id = reconnaissances.livre_id
    WHERE livres.id = :idLivre';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam('idLivre', $idLivre);
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Reconnaissances");
        $requetePreparee->execute();
        $livreId = $requetePreparee;
        return $livreId;
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