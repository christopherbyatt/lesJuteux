<?php
declare(strict_types=1);

namespace App\Modeles;
use App\App;
use \PDO;

class Article {
    private int $id = 0;
    private int $quantite = 0;
    private int $livre_id = 0;
    private int $panier_id = 0;

    public function __construct() {

    }
    // Methodes statiques
    public static function trouverTout():array {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM articles';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Article");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $articles = $requetePreparee->fetchAll();

        return $articles;
    }
    public static function trouverParId(int $unIdArticle):Article {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM articles WHERE id=:idArticle';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idArticle', $unIdArticle, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Article");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $article = $requetePreparee->fetch();

        return $article;
    }
    public static function trouverParIdPanier(int $unIdPanier):array {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM articles WHERE panier_id=:idPanier';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idPanier', $unIdPanier, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Article");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $articles = $requetePreparee->fetchAll();

        return $articles;
    }
    public static function trouverParLivreEtPanier(int $unIdLivre, int $unIdPanier):?Article {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM articles WHERE panier_id=:idPanier AND livre_id=:idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idPanier', $unIdPanier, PDO::PARAM_INT);
        $requetePreparee->bindParam('idLivre', $unIdLivre, PDO::PARAM_INT);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Article");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $article = $requetePreparee->fetch();

        if($article === false) {
            $article = null;
        }

        return $article;
    }
    public function inserer():void {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = "INSERT INTO articles (quantite, livre_id, panier_id) VALUES (:quantite, :livreId, :panierId)";
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('quantite', $this->quantite, PDO::PARAM_STR);
        $requetePreparee->bindParam('livreId', $this->livre_id, PDO::PARAM_INT);
        $requetePreparee->bindParam('panierId', $this->panier_id, PDO::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();
    }
    public function updateLaQuantite():void {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = "UPDATE articles SET quantite=:quantite WHERE id=:id";
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('quantite', $this->quantite, PDO::PARAM_INT);
        $requetePreparee->bindParam('id', $this->id, PDO::PARAM_INT);

        // Exécuter la requête
        $requetePreparee->execute();
    }
    public function supprimer($unId):void {
        $pdo = App::getPDO();
        // Définir la chaine SQL
        $chaineSQL = "DELETE FROM articles WHERE id=:id";
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('id', $unId, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }
    //Setters
    public function setId($unId):void {
        $this->id = (int) $unId;
    }
    public function setQuantite($uneQuantite):void {
        $this->quantite = (int) $uneQuantite;
    }
    public function setIdLivre($unIdLivre):void {
        $this->livre_id = (int) $unIdLivre;
    }
    public function setIdPanier($unIdPanier):void {
        $this->panier_id = (int) $unIdPanier;
    }
    //Getters
    public function getId():int {
        return $this->id;
    }
    public function getQuantite():int {
        return $this->quantite;
    }
    public function getIdLivre():int {
        return $this->livre_id;
    }
    public function getIdPanier():int {
        return $this->panier_id;
    }
}
