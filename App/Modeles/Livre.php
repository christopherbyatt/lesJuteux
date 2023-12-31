<?php
declare(strict_types=1);

namespace App\Modeles;
use App\Modeles\Categorie;
use App\Modeles\Type_couverture;
use App\App;
use App\Modeles\Type_impression;
use http\Params;
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
    private string $prenom =" ";
    private string $nom = " ";
    private string $notice = '';
    private string $site_web = '';
    private int $livre_id = 0;
    private int $auteur_id =0;

    private array $arr_tri = array();

    // Méthodes statiques
    public function __construct() {

    }
    public static function compter():int {
        $chaineSQL = 'SELECT COUNT(*) as total FROM livres';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->execute();
        $resultat = $requetePreparee->fetch();
        return $resultat["total"];
    }

    public static function trouverTout():array {

        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres';
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
        $chaineSQL = 'SELECT * FROM livres
        WHERE date_parution_quebec BETWEEN "2023-01-01" AND "2023-12-31"';
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
        $chaineSQL = 'SELECT * FROM livres
        WHERE date_parution_quebec BETWEEN "2024-01-01" AND "2024-12-31"';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livresAVenir = $requetePreparee->fetchAll();
        return $livresAVenir;
    }
    public static function paginer(int $unNoDePage, int $unNbrParPage):array {
        $pdo = App::getPdo();
        $occurence = $unNoDePage * $unNbrParPage;
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
    public static function paginerFiltres(int $unNoDePage, int $unNbrParPage, array $desFiltres):array {
//        SELECT * FROM `livres` WHERE categorie_id in(1,2) AND date_parution_quebec > '2020-01-01' ORDER BY titre ASC
        $pdo = App::getPdo();
        $occurence = $unNoDePage * $unNbrParPage;
        $desCategories = "";
        foreach ($desFiltres as $unFiltre) {
            if($desCategories === "") {
                $desCategories = $desCategories . $unFiltre;
            }
            else {
                $desCategories = $desCategories . ", " . $unFiltre;
            }
        }
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres';
        if(count($desFiltres) !== 0){
            $chaineSQL = $chaineSQL . " WHERE categorie_id in(".$desCategories.")";
        }
        $chaineSQL = $chaineSQL . " LIMIT ".$occurence.", ".$unNbrParPage;
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }
    public static function compterFiltre(array $desFiltres):int {
        $desCategories = "";
        foreach ($desFiltres as $unFiltre) {
            if($desCategories === "") {
                $desCategories = $desCategories . $unFiltre;
            }
            else {
                $desCategories = $desCategories . ", " . $unFiltre;
            }
        }
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(*) FROM livres';
        if(count($desFiltres) !== 0){
            $chaineSQL = $chaineSQL . " WHERE categorie_id in(".$desCategories.")";
        }
    //        echo $chaineSQL;
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->execute();
        $resultat = $requetePreparee->fetch();
    //        var_dump($resultat["COUNT(*)"]);
        return $resultat["COUNT(*)"];
    }
    public static function paginerNouveautes(int $unNoDePage, int $unNbrParPage):array {
        $pdo = App::getPdo();
        $occurence = $unNoDePage * $unNbrParPage;
        // Idée code pour date il y a 6 mois StackOverflow
        // https://stackoverflow.com/questions/2625469/php-simplest-way-to-get-the-date-of-the-month-6-months-prior-on-the-first
        $date1an = date('Y-m-d', strtotime("-12 months"));
        $dateAjd = date('Y-m-d', time());
//        echo $date1an;
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres WHERE date_parution_quebec>:date1an AND date_parution_quebec<:dateAjd LIMIT :unNoPage, :unNbrPage';
        // Préparer la requête (optimisation)
        $requetePreparee = $pdo->prepare($chaineSQL);

        // BindParam
        $requetePreparee->bindParam('unNoPage', $occurence, PDO::PARAM_INT);
        $requetePreparee->bindParam('unNbrPage', $unNbrParPage, PDO::PARAM_INT);
        $requetePreparee->bindParam('date1an', $date1an, PDO::PARAM_STR);
        $requetePreparee->bindParam('dateAjd', $dateAjd, PDO::PARAM_STR);

        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }
    public static function compterNouveautes():int {
        $date1an = date('Y-m-d', strtotime("-12 months"));
        $dateAjd = date('Y-m-d', time());

        $chaineSQL = 'SELECT COUNT(*) as total FROM livres WHERE date_parution_quebec>:date1an AND date_parution_quebec<:dateAjd';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam('date1an', $date1an, PDO::PARAM_STR);
        $requetePreparee->bindParam('dateAjd', $dateAjd, PDO::PARAM_STR);
        $requetePreparee->execute();
        $resultat = $requetePreparee->fetch();
        return $resultat["total"];
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
    public static function trouverParAuteur(int $idAuteur):array{
        $chaineSQL = 'SELECT livres.id, livres.isbn_papier, livres.titre, livres.prix_can FROM livres 
    INNER JOIN livres_auteurs on livres_auteurs.livre_id = livres.id 
         WHERE livres_auteurs.auteur_id = :idAuteur';
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam('idAuteur', $idAuteur);
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, "App\Modeles\Livre");
        $requetePreparee->execute();
        $livreId = $requetePreparee->fetchAll();
        return $livreId;
    }
    public function getId():int{
        return $this->id;
    }
    public function getNomAuteur():string{
        return $this->nom;
    }
    public function getPrenomAuteur():string{
        return $this->prenom;
    }
    public function getPrenomNomAuteur():string{
        return $this->prenom." ".$this->nom;
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

    public function getAuteurId():int{
        return $this->auteur_id;
    }
    public function getAuteur():array{
        return Auteur::trouverParLivre($this->id);
    }
    public function getCategorie():array{
        return Categorie::trouverParLivre($this->id);
    }
    public function getCategorieAssociee(){
        return Categorie::trouverParId((int)$this->categorie_id);
    }
    public function getTypeCouvertureAssociee(){
        return Type_couverture::trouverParId($this->type_couverture_id);
    }
    public function getTypeImpressionAssociee(){
        return Type_impression::trouverParId($this->type_impression_id);
     }
    public function getReconnaissances():array{
        return Reconnaissances::trouverParLivre($this->id);
    }
}