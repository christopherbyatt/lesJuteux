<?php
namespace App\Controleurs;
use App\Modeles\Auteur;
use App\App;
use App\Modeles\Livre;

class ControleurAuteur {
    public function index():void {
        $urlPagination= "index.php?controleur=auteur&action=index";

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else {
            $page = 0;
        }

        $auteurs = Auteur::paginer($page,12);
        $nbrPages = ceil(Auteur::compter()/12 -1);

        $tDonnees = array("message" => "Je suis la page Index auteurs...", "auteurs" => $auteurs, "numeroPage"=>$page, "urlPagination" => $urlPagination, "nombreTotalPages"=>$nbrPages);
        echo App::getBlade()->run("auteurs.index", $tDonnees);
    }

    public function fiche():void{
        $id = (int) $_GET['idAuteur'];
        $auteur = Auteur::trouverParId($id);

        $tDonnees = array("message" => "Je suis la page Fiche auteurs...", "auteur" => $auteur);
        echo App::getBlade()->run("auteurs.fiche", $tDonnees);
    }
}