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
    private string $site_web = '';
    private int $livre_id = 0;
    private int $auteur_id =0;

    // Méthodes statiques
    public function __construct() {

    }
    public static function trouverTout():array{
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs ORDER BY auteurs.nom ASC';
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
    public static function trouverParLivre(int $idLivre):array{
        $chaineSQL = 'SELECT * FROM auteurs 
         INNER JOIN livres_auteurs ON livres_auteurs.auteur_id = auteurs.id
         WHERE livres_auteurs.livre_id = :idLivre';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam('idLivre', $idLivre);
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Auteur");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteurId = $requetePreparee->fetchAll();
        return $auteurId;

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
        return $this->prenom." ".$this->nom;
    }
    public function getNotice():string{
        return $this->notice;
    }
    public function getSiteWeb():string{
        return $this->site_web;
    }
    public function getlivreId():int{
        return $this->livre_id;
    }
    public function getAuteurId():int{
        return $this->auteur_id;
    }
    public function getLivre():array{
        return Livre::trouverParAuteur($this->id);
    }

    public function getLivresAssocies(){
        return Livre::trouverParAuteur($this->id);
    }
}