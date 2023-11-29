<?php

namespace App\Controleurs;

use App\App;
use App\Modeles\Actualite;
use App\Modeles\Evenement;
use App\Modeles\Livre;
use App\Modeles\Utilisateur;

class ControleurSite {
    public function accueil(): void {
        $livresAVenirs = Livre::trouverParVenir();
        $livresNouveautes = Livre::trouverParNouveautes();
        $actualites = Actualite::trouverTout();
        $evenenents = Evenement::trouverTout();

        $tDonnees = array("message" => "Je suis la page Index auteurs...","livresAVenirs" => $livresAVenirs, "livresNouveautes"=>$livresNouveautes, "actualites"=>$actualites, "evenenents"=>$evenenents);
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
    public function paiement():void {
        $unUser = Utilisateur::trouverParId(1);
        $tDonnees = array('utilisateur'=>$unUser);
        echo App::getBlade()->run('paiement', $tDonnees);
    }
    public function confirmation():void {
        if(isset($_POST)) {
            $leNom = $_POST['nom'];
            $lePrenom = $_POST['prenom'];
            $leCourriel = $_POST['courriel'];
            $lAdresse = $_POST['adresse'];
            $laVille = $_POST['ville'];
            $laProvince = $_POST['province'];
            $lePays = $_POST['pays'];
            $leCodePostal = $_POST['codePostal'];
        }
        $tDonnees = array('leNom'=>$leNom, 'lePrenom'=>$lePrenom, 'leCourriel'=>$leCourriel, 'lAdresse'=>$lAdresse, 'laVille'=>$laVille, 'laProvince'=>$laProvince, 'lePays'=>$lePays, 'leCodePostal'=>$leCodePostal);
        echo App::getBlade()->run('confirmation', $tDonnees);
    }
}