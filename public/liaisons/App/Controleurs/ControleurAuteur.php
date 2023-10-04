<?php
namespace App\Controleurs;
use App\Modeles\Auteur;
use App\App;

class ControleurAuteur {
    public function index():void {
        $auteurs = Auteur::trouverTout();

        $tDonnees = array("message" => "Je suis la page Index activites...", "auteurs" => $auteurs);
        echo App::getBlade()->run("auteurs.index", $tDonnees);
    }

    public function fiche():void{
        $id = (int) $_GET['idAuteur'];
        $auteur = Auteur::trouverParId($id);

        $tDonnees = array("message" => "Je suis la page Fiche activites...", "activite" => $auteur, "ville" => $ville, "region" => $region, "niveau" => $niveau, "categorie" => $categorie, "participants" => $participants);
        echo App::getBlade()->run("activites.fiche", $tDonnees);
    }
}