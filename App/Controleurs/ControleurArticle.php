<?php

namespace App\Controleurs;

use App\Modeles\Article;
use App\App;

class ControleurArticle {
    public function inserer():void {
        if(isset($_GET["idLivre"])) {
            $idLivre = $_GET["idLivre"];
        }
        $lePanier = App::getPanier();
        $lArticle = Article::trouverParLivreEtPanier($idLivre, $lePanier->getId());
        $laQte = (int) $_POST["qteLivres"];
//        if($laQte > 10) {
//            $laQte = 10;
//        }
//        elseif ($laQte < 0) {
//            $laQte = 0;
//        }
        if($lArticle !== null) {
            //l'article existe
            $lArticle->setQuantite($laQte);
            $lArticle->updateLaQuantite();
        }
        else {
            //l'article n'existe pas
            $nouvelArticle = new Article();
            $nouvelArticle->setQuantite($laQte);
            $nouvelArticle->setIdLivre($idLivre);
            $nouvelArticle->setIdPanier($lePanier->getId());
            $nouvelArticle->inserer();
        }
//        var_dump($lePanier);
        header('Location: index.php?controleur=livre&action=fiche&idLivre='.$idLivre.'&popUp=true');
        exit;
    }

    public function supprimer():void {
        if(isset($_GET["idArticle"])) {
            $idArticle = $_GET["idArticle"];
        }
        $exArticle = new Article();
        $exArticle->supprimer($idArticle);
        header('Location: index.php?controleur=site&action=panier');
        exit;
    }
}