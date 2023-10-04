<?php
declare(strict_types=1);
namespace App;
use App\Controleurs\ControleurSite;
use App\Controleurs\ControleurAuteur;
use \PDO;
use eftec\bladeone\BladeOne;

class App {
    private static ?PDO $refPDO = null;
    private static ?BladeOne $refBlade = null;

    public function __construct() {
        error_reporting(E_ALL | E_STRICT);
        date_default_timezone_set('America/Montreal');
        $this->routerRequete();
    }

    public static function getPDO() {
        if (App::$refPDO == null) {
            // Exemple de paramètre de connexion
            $serveur = 'localhost';
            $utilisateur = 'root';
            $motDePasse = 'root';
            $nomBd = 'bd_club_v1';
            $chaineDSN = "mysql:dbname=$nomBd;host=$serveur";    // Data source name

            // Tentative de connexion
            $pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
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
        if ($nomControleur === 'site'){
            $objControleur = new ControleurSite();
            switch ($nomAction) {
                case 'accueil':
                    $objControleur->accueil();
                    break;
                case 'apropos':
                    $objControleur->apropos();
                    break;
                default:
                    echo 'Erreur 404 - Page introuvable.';
            }
        } else if ($nomControleur === 'activite'){
            $objControleur = new ControleurActivite();
            switch ($nomAction) {
                case 'index':
                    $objControleur->index();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
            }
        }
        else if ($nomControleur === 'participant'){
            $objControleur = new ControleurParticipant();
            switch ($nomAction) {
                case 'index':
                    $objControleur->index();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
            }
        }
        else if ($nomControleur === 'ville'){
            $objControleur = new ControleurVille();
            switch ($nomAction) {
                case 'index':
                    $objControleur->index();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
            }
        }
        else if ($nomControleur === 'region'){
            $objControleur = new ControleurRegion();
            switch ($nomAction) {
                case 'index':
                    $objControleur->index();
                    break;
                case 'fiche':
                    $objControleur->fiche();
                    break;
            }
        }else{
            echo 'Erreur 404 - Page introuvable.';
        }
    }
}