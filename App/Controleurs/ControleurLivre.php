<?php
namespace App\Controleurs;
use App\App;
use App\Modeles\Auteur;
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
<<<<<<< HEAD
=======
//        $auteur = Auteur::trouverParId();
>>>>>>> Clodiane
        $tDonnees = array("message" => "Je suis la page Fiche auteurs...", "livre" => $livre);
        echo App::getBlade()->run("livres.fiche", $tDonnees);
    }
}