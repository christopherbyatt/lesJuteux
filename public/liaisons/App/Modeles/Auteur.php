<?php
declare(strict_types=1);
namespace App\Modeles;
use \PDO;
use App\App;

//Classe modèle
class Auteur {
    private int $id = 0 ;
    private string $nom = '';
    private string $prenom = '';
    private string $sexe = '';
    private string $naissance = '';
    private string $telephone = '';
    private int $activite_id = 0;
    private int $ville_id = 0;
    private static PDO $pdo;

    public function __construct() {
        self::$pdo = App::getPDO();
    }
    public static function trouverTout():array{
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM participants';
        // Préparer la requête (optimisation)
        $requetePreparee = self::$pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteurs = $requetePreparee->fetchAll();
        return $auteurs;
    }
    public static function trouverParId(int $unIdAuteur):Auteur {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs WHERE id=:idAuteur';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);

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
    public function getPrenomNom():string{
        return $this->prenom . " " . $this->nom;
    }
    public function getSexe():string{
        return $this->sexe;
    }
    public function getNaissance():string{
        return $this->naissance;
    }
    public function getTelephone():string{
        return $this->telephone;
    }
    public function getActiviteId():int{
        return $this->activite_id;
    }
    public function getVilleId():int{
        return $this->ville_id;
    }
}