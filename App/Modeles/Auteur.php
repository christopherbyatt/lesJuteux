<?php
declare(strict_types=1);

namespace App\Modeles;
use App\App;
use \PDO;

// Classe modèle
class Auteur {
    private int $id = 0;
    private string $nom = '';
    private string $prenom = '';
    private string $notice = '';
    private string $siteWeb = '';

    // Méthodes statiques
    public function __construct() {

    }
    public static function trouverTout():array{
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Auteur");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteurs = $requetePreparee->fetchAll();

        return $auteurs;
    }
    public static function trouverParId(int $unIdAuteur):Auteur{

        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs WHERE id=:idAuteur';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idAuteur', $unIdAuteur);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Auteur");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteur = $requetePreparee->fetch();

        return $auteur;
    }
    public function getId():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function getPrenom():string{
        return $this->prenom;
    }
    public function getNotice():string{
        return $this->notice;
    }
    public function getSiteWeb():string{
        return $this->siteWeb;
    }
}