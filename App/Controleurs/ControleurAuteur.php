<?php
namespace App\Controleurs;
use App\Modeles\Auteur;
use App\App;
use App\Modeles\Livre;

class ControleurAuteur {
    public function index():void {
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