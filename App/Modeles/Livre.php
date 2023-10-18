<?php
declare(strict_types=1);

namespace App\Modeles;
use App\App;
use \PDO;

// Classe modèle
class Livre {
    private int $id = 0;
    // BD livres
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

    // BD livres_auteurs
    private int $auteur_id = 0;
    private int $livre_id = 0;

    // BD auteurs
    private string $notice = '';
    private string $site_web = '';
    private string $prenom = '';
    private string $nom = '';

    // Méthodes statiques
    public function __construct() {

    }
    public static function trouverTout():array {

        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres 
        INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id
        INNER JOIN auteurs ON livres_auteurs.auteur_id = auteurs.id
        ORDER BY auteurs.nom';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }
    public static function trouverParId(int $unIdLivre):Livre {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE id=:idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // BindParam
        $requetePreparee->bindParam('idLivre', $unIdLivre);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livre = $requetePreparee->fetch();

        return $livre;
    }
    public function getId():int{
        return $this->livre_id;
    }
    public function getISBNPapier():string{
        return $this->isbn_papier;
    }
    public function getTitre():string{
        return $this->titre;
    }
    public function getLeLivre():string{
        return $this->le_livre;
    }
    public function getStatut():string{
        return $this->statut;
    }
    public function getArguments():string{
        return $this->arguments_commerciaux;
    }
    public function getPagination():string{
        return $this->pagination;
    }
    public function getAgeMin():string{
        return $this->age_min;
    }
    public function getFormat():string{
        return $this->format;
    }
    public function getTirage():string{
        return $this->tirage;
    }
    public function getPrixCan():string{
        return $this->prix_can;
    }
    public function getPrixEuro():string{
        return $this->prix_euro;
    }
    public function getDateQuebec():string{
        return $this->date_parution_quebec;
    }
    public function getDateFrance():string{
        return $this->date_parution_france;
    }
    public function getCategorieId():string{
        return $this->categorie_id;
    }
    public function getTypeImpressionId():int{
        return $this->type_impression_id;
    }
    public function getTypeCouvertureId():int{
        return $this->type_couverture_id;
    }
}