<?php
declare(strict_types=1);

namespace App\Modeles;
use App\Modeles\Categorie;
use App\Modeles\Type_couverture;
use App\App;
use \PDO;

// Classe modèle
class Livre {
    // BD livres
    private int $id = 0;
    private string $isbn_papier = '';
    private string $titre = '';
    private string $le_livre = '';
    private string $arguments_commerciaux = '';
    private string $statut = '';
    private string $pagination = '';
    private string $format = '';
    private string $prix_can = '';
    private string $prix_euro = '';
    private string $date_parution_quebec = '';
    private string $date_parution_france = '';
    private string $categorie_id = '';
    private $type_impression_id = 0;
    private $type_couverture_id = 0;
<<<<<<< HEAD
    private string $prenom =" ";
    private string $nom = " ";
=======

    // BD livres_auteurs
    private int $auteur_id = 0;
>>>>>>> Clodiane

    // Méthodes statiques
    public function __construct() {

    }
    public static function compter(){
        $chaineSQL = 'SELECT COUNT(*) as total FROM livres';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->execute();
        $resultat = $requetePreparee->fetch();
        return $resultat["total"];
    }

    public static function trouverTout():array {

        // Définir la chaine SQL
<<<<<<< HEAD
        $chaineSQL = 'SELECT * FROM livres';
=======
        $chaineSQL = 'SELECT livres.id, livres.isbn_papier, livres.titre, livres.le_livre, livres.arguments_commerciaux, livres.statut, livres.pagination, livres.format, livres.prix_can, livres.prix_euro, livres.date_parution_quebec, livres.date_parution_france, livres.categorie_id, livres.type_impression_id, livres.type_couverture_id, livres_auteurs.auteur_id FROM livres 
        INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id';
>>>>>>> Clodiane
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
    public static function trouverParNouveautes():array {
<<<<<<< HEAD
        $chaineSQL = 'SELECT * FROM livres
        WHERE date_parution_quebec BETWEEN "2022-01-01" AND "2022-12-31"';
=======
        $chaineSQL = 'SELECT livres.id, livres.isbn_papier, livres.titre, livres.le_livre, livres.arguments_commerciaux, livres.statut, livres.pagination, livres.format, livres.prix_can, livres.prix_euro, livres.date_parution_quebec, livres.date_parution_france, livres.categorie_id, livres.type_impression_id, livres.type_couverture_id, livres_auteurs.auteur_id FROM livres 
        INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id
        WHERE date_parution_quebec BETWEEN "2022-01-01" AND "2022-12-31"
        LIMIT 0,3';
>>>>>>> Clodiane
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livresNouveautes = $requetePreparee->fetchAll();
        return $livresNouveautes;
    }
    public static function trouverParVenir():array {
<<<<<<< HEAD
        $chaineSQL = 'SELECT * FROM livres
        WHERE date_parution_quebec BETWEEN "2023-10-18" AND "2024-12-31"';
=======
        $chaineSQL = 'SELECT livres.id, livres.isbn_papier, livres.titre, livres.le_livre, livres.arguments_commerciaux, livres.statut, livres.pagination, livres.format, livres.prix_can, livres.prix_euro, livres.date_parution_quebec, livres.date_parution_france, livres.categorie_id, livres.type_impression_id, livres.type_couverture_id, livres_auteurs.auteur_id FROM livres 
        INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id
        WHERE date_parution_quebec BETWEEN "2023-10-18" AND "2024-12-31"
        LIMIT 2,3';
>>>>>>> Clodiane
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livresAVenir = $requetePreparee->fetchAll();
        return $livresAVenir;
    }
    public static function paginer(int $unNoDePage, int $unNbrParPage){
        $pdo = App::getPdo();
        $occurence = $unNoDePage * 5;
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres LIMIT :unNoPage, :unNbrPage';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);

        // BindParam
        $requetePreparee->bindParam('unNoPage', $occurence, PDO::PARAM_INT);
        $requetePreparee->bindParam('unNbrPage', $unNbrParPage, PDO::PARAM_INT);
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
        $chaineSQL = 'SELECT * FROM livres 
        WHERE livres.id=:idLivre';
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
        return $this->id;
    }
    public function getAuteurId(){
        return $this->auteur_id;
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
    public function getFormat():string{
        return $this->format;
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
    public function getAuteur():array{
        return Auteur::trouverParLivre($this->id);
    }

    public function getCategorieAssociee(){
        return Categorie::trouverParId((int)$this->categorie_id);
    }

    public function getTypeCouvertureAssociee(){
        return Type_couverture::trouverParId($this->type_couverture_id);
    }

}