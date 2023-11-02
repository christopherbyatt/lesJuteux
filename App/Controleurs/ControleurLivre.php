<?php
namespace App\Controleurs;
use App\App;
use App\Modeles\Livre;

class ControleurLivre {
    public function index():void {
//        $livres = Livre::trouverTout();
        $livresAVenirs = Livre::trouverParVenir();
        $livresNouveautes = Livre::trouverParNouveautes();

        $urlPagination = 'index.php?controleur=livre&action=index';

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else {
            $page = 0;
        }

        $livres = Livre::paginer($page,12);
        $nbrPages = ceil(livre::compter()/12 -1);

        $tDonnees = array("message" => "Je suis la page Index auteurs...", "livres" => $livres ,"livresAVenirs" => $livresAVenirs, "livresNouveautes"=>$livresNouveautes, "numeroPage"=>$page, "urlPagination" => $urlPagination, "nombreTotalPages"=>$nbrPages);
        echo App::getBlade()->run("livres.index", $tDonnees);
    }

    public function fiche():void{
        $id = (int) $_GET['idLivre'];
        $livre = Livre::trouverParId($id);
        $categorie = $livre->getCategorieAssociee();
        $couverture = $livre->getTypeCouvertureAssociee();
        $impression = $livre->getTypeImpressionAssociee();
        $tDonnees = array("message" => "Je suis la page Fiche auteurs...", "livre" => $livre, "categorie" => $categorie, "type_couverture" => $couverture, "type_impression" => $impression);
        echo App::getBlade()->run("livres.fiche", $tDonnees);
    }

    public function tri(){
//        $livres = Livre::trouverTout();

        if(isset($_GET['selection'])){
            $selection = $_GET['selection'];
        }else {
            $selection = 0;
        }

        $livresTries = Livre::trier($selection);

//        $urlPagination = 'index.php?controleur=livre&action=index';

//        $livres = Livre::paginer($page,12);
//        $nbrPages = ceil(livre::compter()/12 -1);
//
//        $tDonnees = array("message" => "Je suis la page Index auteurs...", "livres" => $livres ,"livresAVenirs" => $livresAVenirs, "livresNouveautes"=>$livresNouveautes, "numeroPage"=>$page, "urlPagination" => $urlPagination, "nombreTotalPages"=>$nbrPages);
//        echo App::getBlade()->run("livres.index", $tDonnees);
    }
}