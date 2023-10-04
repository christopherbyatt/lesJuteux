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
    public function boutique(): void {
        $tDonnees = array("message"=>"Je suis la page Boutique...");
        echo App::getBlade()->run("page",$tDonnees);
    }
    public function production(): void {
        $tDonnees = array("message"=>"Je suis la page Production...");
        echo App::getBlade()->run("page",$tDonnees);
    }
    public function contact(): void {
        $tDonnees = array("message"=>"Je suis la page Contact...");
        echo App::getBlade()->run("page",$tDonnees);
    }
}