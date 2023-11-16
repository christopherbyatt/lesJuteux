<?php
namespace App\Controleurs;
use App\App;
use App\Modeles\Categorie;
use App\Modeles\Evenement;
use App\Modeles\Livre;

class ControleurLivre
{
    public function index():void {
//        $livres = Livre::trouverTout();
        $livresAVenirs = Livre::trouverParVenir();
        $livresNouveautes = Livre::trouverParNouveautes();
        $lesCategories = Categorie::trouverTout();

        // Code pour trouver l'URL actuel de JavaTPoint
        // https://www.javatpoint.com/how-to-get-current-page-url-in-php
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $urlPagination = "https://";
        else
            $urlPagination = "http://";
        // Append the host(domain name, ip) to the URL.
        $urlPagination.= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL
        $urlPagination.= $_SERVER['REQUEST_URI'];

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 0;
        }

        if (isset($_GET['filtres'])) {
            $filtre = true;
        } else {
            $filtre = false;
        }

        if(isset($_POST["choixCategorie"])){
            $lesChoixCategorie = $_POST["choixCategorie"];
            foreach ($lesChoixCategorie as $unChoixCategorie) {
                $urlPagination .= "&choixCategorie[]=" . $unChoixCategorie;
            }
        }
        elseif(isset($_GET["choixCategorie"])) {
            $lesChoixCategorie = $_GET["choixCategorie"];
        }

        if ($filtre === true) {
            $livres = Livre::paginerFiltres($page, 12, $lesChoixCategorie);
            $nbrPages = ceil(livre::compterFiltre($lesChoixCategorie) / 12 - 1);
        } else {
            $livres = Livre::paginer($page, 12);
            $nbrPages = ceil(livre::compter() / 12 - 1);
        }
        $tDonnees = array("message" => "Je suis la page Index auteurs...", "livres" => $livres, "livresAVenirs" => $livresAVenirs, "livresNouveautes" => $livresNouveautes, "numeroPage" => $page, "urlPagination" => $urlPagination, "nombreTotalPages" => $nbrPages, "lesCategories" => $lesCategories);
        echo App::getBlade()->run("livres.index", $tDonnees);
    }

    public function nouveautes():void {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 0;
        }

        $urlPagination = 'index.php?controleur=nouveaute&action=index';

        $livres = Livre::paginerNouveautes($page, 12);
        $nbrPages = ceil(livre::compterNouveautes() / 12 - 1);

        $tDonnees = array("message" => "Je suis la page Index auteurs...", "livres" => $livres, "numeroPage" => $page, "urlPagination" => $urlPagination, "nombreTotalPages" => $nbrPages);
        echo App::getBlade()->run("livres.nouveautes", $tDonnees);
    }

    public function fiche():void {
        $id = (int) $_GET['idLivre'];
//        $idAuteur = (int) $_GET['idAuteur'];

        $livre = Livre::trouverParId($id);
        $categorie = $livre->getCategorieAssociee();
        $couverture = $livre->getTypeCouvertureAssociee();
        $impression = $livre->getTypeImpressionAssociee();
//        $auteur = $livre->getAuteurId();
//        var_dump($auteur);
//        $livresAuteur = Livre::trouverParAuteur(2);
//        var_dump($livresAuteur);
        $tDonnees = array("message" => "Je suis la page Fiche auteurs...", "livre" => $livre, "categorie" => $categorie, "type_couverture" => $couverture, "type_impression" => $impression);
        echo App::getBlade()->run("livres.fiche", $tDonnees);
    }
}