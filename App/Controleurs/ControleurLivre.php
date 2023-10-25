<?php
namespace App\Controleurs;
use App\App;
use App\Modeles\Auteur;
use App\Modeles\Livre;

class ControleurLivre {
    public function index():void {
        $livres = Livre::trouverTout();
        $livresAVenirs = Livre::trouverParVenir();
        $livresNouveautes = Livre::trouverParNouveautes();
        $tDonnees = array("message" => "Je suis la page Index auteurs...", "livres" => $livres ,"livresAVenirs" => $livresAVenirs, "livresNouveautes"=>$livresNouveautes);
        echo App::getBlade()->run("livres.index", $tDonnees);
    }

    public function fiche():void{
        $id = (int) $_GET['idLivre'];
        $livre = Livre::trouverParId($id);
//        $auteur = Auteur::trouverParId();
        $tDonnees = array("message" => "Je suis la page Fiche auteurs...", "livre" => $livre);
        echo App::getBlade()->run("livres.fiche", $tDonnees);
    }
}