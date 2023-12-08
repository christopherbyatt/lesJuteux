<?php
declare(strict_types=1);

namespace App\Modeles;
use App\App;
use \PDO;

class Panier {
    private int $id = 0;
    private string $id_session = "";
    private int $date_unix_dernier_acces = 0;

    public function __construct() {

    }
    // Methodes statiques
    public static function trouverTout():array {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paniers';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Panier");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $paniers = $requetePreparee->fetchAll();

        return $paniers;
    }
    public static function trouverParId(int $unIdPanier):Categorie {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paniers WHERE id=:idPanier';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idPanier', $unIdPanier, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Panier");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $panier = $requetePreparee->fetch();

        return $panier;
    }
    public static function trouverParIdSession(string $unIdSession):?Panier {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paniers WHERE id_session=:idSession';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idSession', $unIdSession, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Panier");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $existenceDuPanier = $requetePreparee->fetch();

        if($existenceDuPanier === false) {
            $existenceDuPanier = null;
        }

        return $existenceDuPanier;
    }
    public function inserer():void {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = "INSERT INTO paniers (id_session, date_unix_dernier_acces) VALUES (:idSession, :dernierAcces)";
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idSession', $this->id_session, PDO::PARAM_STR);
        $requetePreparee->bindParam('dernierAcces', $this->date_unix_dernier_acces, PDO::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();
    }
    public function updateLeTemps():void {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = "UPDATE paniers SET date_unix_dernier_acces=:dernierAcces WHERE id=:id";
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('dernierAcces', $this->date_unix_dernier_acces, PDO::PARAM_INT);
        $requetePreparee->bindParam('id', $this->id, PDO::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();
    }
    //Setters
    public function setId(int $unId):void {
        $this->id = $unId;
    }
    public function setIdSession(string $unIdSession):void {
        $this->id_session = $unIdSession;
    }

    public function setDernierAcces(int $unAcces):void {
        $this->date_unix_dernier_acces = $unAcces;
    }
    //Getters
    public function getId():int {
        return $this->id;
    }
    public function getIdSession():string {
        return $this->id_session;
    }

    public function getDernierAcces():int {
        return $this->date_unix_dernier_acces;
    }
}
