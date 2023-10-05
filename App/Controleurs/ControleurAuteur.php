<?php
namespace App\Controleurs;
use App\Modeles\Auteur;
use App\App;

class ControleurAuteur {
    public function index():void {
        $auteurs = Auteur::trouverTout();

        $tDonnees = array("message" => "Je suis la page Index auteurs...", "auteurs" => $auteurs);
        echo App::getBlade()->run("auteurs.index", $tDonnees);
    }

    public function fiche():void{
        $id = (int) $_GET['idAuteur'];
        $auteur = Auteur::trouverParId($id);

        $tDonnees = array("message" => "Je suis la page Fiche auteurs...", "auteur" => $auteur);
        echo App::getBlade()->run("auteurs.fiche", $tDonnees);
    }
}