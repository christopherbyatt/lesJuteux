<?php
declare(strict_types=1);
namespace App;
use App\Controleurs\ControleurArticle;
use App\Controleurs\ControleurSite;
use App\Controleurs\ControleurAuteur;
use App\Controleurs\ControleurLivre;
use App\Controleurs\ControleurPanier;
use App\Controleurs\ControleurCompte;
use App\Modeles\Panier;
use \PDO;
use eftec\bladeone\BladeOne;
error_reporting(E_ALL);
ini_set('display_errors', '1');

class App {
    private static ?PDO $refPDO = null;
    private static ?BladeOne $refBlade = null;
    private static string $idSession = "";

    public function __construct() {
        error_reporting(E_ALL | E_STRICT);
        date_default_timezone_set('America/Montreal');
        $this->demarrerSession();
        $this->routerRequete();
    }
    public static function getServeur(): string
    {
        // Vérifier la nature du serveur (local VS production)
        $env = 'null';
        if ((substr($_SERVER['HTTP_HOST'], 0, 9) == 'localhost') ||
            (substr($_SERVER['HTTP_HOST'], 0, 7) == '199.202')){
            $env = 'serveur-local';
        } else {
            $env = 'serveur-production';
        }
        return $env;
    }

    public static function demarrerSession():void {
        if(session_id() === "") {
            session_start();
        }

        $idSession = session_id(); //utiliser la méthode session_id pour récupérer l’id de l’utilisateur.

//        echo $idSession ; // Affiche l’identifiant de la session courante
        App::$idSession = $idSession;

        if(Panier::trouverParIdSession(App::$idSession) !== null) {
            $lePanier = Panier::trouverParIdSession(App::$idSession);
            $lePanier->setDernierAcces(time());
            $lePanier->updateLeTemps();
        }
        else {
            $lePanier = new Panier();
            $lePanier->setIdSession(App::$idSession);
            $lePanier->setDernierAcces(time());
            $lePanier->inserer();
        }
    }

    public static function getPanier():Panier {
        if(Panier::trouverParIdSession(App::$idSession) !== null) {
            $lePanier = Panier::trouverParIdSession(App::$idSession);
            $lePanier->setDernierAcces(time());
            $lePanier->updateLeTemps();
        }
        else {
            App::demarrerSession();
            $lePanier = Panier::trouverParIdSession(App::$idSession);
        }
        return $lePanier;
    }

    public static function getPDO() {
        if (App::$refPDO == null) {
            if(App::getServeur() === 'serveur-local')
            {
                $serveur = 'localhost';
                $utilisateur = 'root';
                $motDePasse = 'root';
                $nomBd = '23_rpni3_lesjuteux';
                $chaineDSN = "mysql:dbname=$nomBd;host=$serveur";    // Data source name
                $pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
            }else if(App::getServeur() === 'serveur-production'){
                // echo "Erreur: Vous devez configurer la connexion du serveur de production (timunix3).";
                $serveur = 'localhost';
                $utilisateur = '23_rpni3_lesjuteux';
                $motDePasse = 'lC(D*auUiI8HG14w';
                $nomBd = '23_rpni3_lesjuteux';
                $chaineDSN = "mysql:dbname=$nomBd;host=$serveur";    // Data source name
                $pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
            }
            // Changement d'encodage des caractères UTF-8
            $pdo->exec("SET NAMES utf8");
            // Affectation des attributs de la connexion : Obtenir des rapports d'erreurs et d'exception avec errorInfo()
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            App::$refPDO = $pdo;
        }

        return App::$refPDO;
    }

    public static function getBlade():BladeOne {
        if(App::$refBlade === null){
            $cheminDossierVues = '../ressources/vues';
            $cheminDossierCache = '../ressources/cache';
            App::$refBlade = new BladeOne($cheminDossierVues,$cheminDossierCache,BladeOne::MODE_AUTO);
        }
        return App::$refBlade;
    }

    public function routerRequete():void {
        // Variables locales
        $nomControleur = 'site'; // Nom du controleur par défaut
        $nomAction = 'accueil'; // Nom de l'action par défaut
        $objControleur = null; // Instance du controleur

        // Si disponible, affecter le nom du controleur de la requête
        if (isset($_GET['controleur'])){
            $nomControleur = $_GET['controleur'];
        }

        // Si disponible, affecter le nom l'action de la requête
        if (isset($_GET['action'])){
            $nomAction = $_GET['action'];
        }

        // Instantier le bon controleur et executer la bonne action
        if ($nomControleur === 'site') {
            $objControleur = new ControleurSite();
            switch ($nomAction) {
                case 'accueil':
                    $objControleur->accueil();
                    break;
                case 'apropos':
                    $objControleur->apropos();
                    break;
                case 'boutique':
                    $objControleur->boutique();
                    break;
                case 'production':
                    $objControleur->production();
                    break;
                case 'contact':
                    $objControleur->contact();
                    break;
                case 'paiement':
                    $objControleur->paiement();
                    break;
                case 'confirmation':
                    $objControleur->confirmation();
                    break;
                default:
                    echo 'Erreur 404 - Page introuvable.';
            }
        }
        else if ($nomControleur === 'livre'){
            $objControleur = new ControleurLivre();
            switch ($nomAction) {
                case 'index':
                    $objControleur->index();
                    break;
                case 'nouveautes':
                    $objControleur->nouveautes();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
            }
        }
        else if ($nomControleur === 'auteur'){
            $objControleur = new ControleurAuteur();
            switch ($nomAction) {
                case 'index':
                    $objControleur->index();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
            }
        }else if ($nomControleur === 'panier') {
            $objControleur = new ControleurPanier();
            switch ($nomAction) {
                case 'index':
                    $objControleur->index();
                    break;
            }
        } else if ($nomControleur === 'compte'){
            $objControleur = new ControleurCompte();
            switch ($nomAction){
                case 'connexion':
                    $objControleur->connexion();
                    break;
                case 'creation':
                    $objControleur->creation();
                    break;
            }
        } else if($nomControleur === 'article') {
            $objControleur = new ControleurArticle();
            switch ($nomAction){
                case 'inserer':
                    $objControleur->inserer();
                    break;
                case 'modifier':
                    $objControleur->modifier();
                    break;
                case 'supprimer':
                    $objControleur->supprimer();
                    break;
            }
        }
    }
}