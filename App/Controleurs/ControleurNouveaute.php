<?php
namespace App\Controleurs;
use App\Modeles\Nouveaute;
use App\App;

class ControleurNouveaute {
    public function index():void {
        $nouveautes = Nouveaute::trouverTout();

        $tDonnees = array("message" => "Je suis la page Index nouveautés...", "nouveautes" => $nouveautes);
        echo App::getBlade()->run("nouveautes.index", $tDonnees);
    }

    public function fiche():void{
        $id = (int) $_GET['idNouveaute'];
        $nouveaute = Nouveaute::trouverParId($id);

        $tDonnees = array("message" => "Je suis la page Fiche nouveauté...", "nouveaute" => $nouveaute);
        echo App::getBlade()->run("nouveautes.fiche", $tDonnees);
    }
}