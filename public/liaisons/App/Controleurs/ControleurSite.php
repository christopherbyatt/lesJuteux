<?php
namespace App\Controleurs;
use App\App;
class ControleurSite {
    public function accueil(): void {
        $tDonnees = array("message"=>"Je suis la page Accueil...");
        echo App::getBlade()->run("accueil",$tDonnees);
    }
    public function apropos(): void {
        $tDonnees = array("message"=>"Je suis la page À propos...");
        echo App::getBlade()->run("apropos",$tDonnees);
    }
}