<?php
declare(strict_types=1);

namespace App\Modeles;
use App\App;
use \PDO;

// Classe modèle
class Nouveaute {

    // Méthodes statiques
    public function __construct() {

    }
    public static function trouverTout():array {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Nouveaute");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }
    public static function trouverParId(int $unIdNouveaute):Nouveaute {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE id=:idNouveaute';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idNouveaute', $unIdNouveaute);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Nouveaute");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livre = $requetePreparee->fetch();

        return $livre;
    }
}