<?php
namespace App\Controleurs;
use App\App;
use App\Modeles\Livre;

class ControleurLivre {
    public function index():void {
        $livres = Livre::trouverTout();

        $tDonnees = array("message" => "Je suis la page Index auteurs...", "livres" => $livres);
        echo App::getBlade()->run("livres.index", $tDonnees);
    }

    public function fiche():void{
        $id = (int) $_GET['idLivre'];
        $livre = Livre::trouverParId($id);

        $tDonnees = array("message" => "Je suis la page Fiche auteurs...", "livre" => $livre);
        echo App::getBlade()->run("livres.fiche", $tDonnees);
    }
}