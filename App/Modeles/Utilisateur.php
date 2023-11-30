<?php

namespace App\Modeles;
use App\App;
use \PDO;
class Utilisateur {
    private int $id = 0;
    private string $nom = "";
    private string $prenom = "";
    private string $courriel = "";

    public function __construct(){
    }
    public static function trouverTout():array{
        $chaineSQL = 'SELECT * FROM utilisateurs';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Utilisateur");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $users = $requetePreparee->fetchAll();
        return $users;
    }
    public static function trouverParId(int $unId):Utilisateur {
        $chaineSQL = 'SELECT * FROM utilisateurs WHERE id=:id';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('id', $unId);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Utilisateur");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $user = $requetePreparee->fetch();
        return $user;
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
    public function getCourriel():string{
        return $this->courriel;
    }
}