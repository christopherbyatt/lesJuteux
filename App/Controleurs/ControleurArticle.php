<?php

namespace App\Controleurs;

use App\Modeles\Article;
use App\App;

class ControleurArticle {
    public function inserer():void {
        if(isset($_GET["idProduit"])) {
            $idProduit = $_GET["idProduit"];
        }
        $lePanier = App::getPanier();
        $lArticle = Article::trouverParProduitEtPanier($idProduit, $lePanier->getId());
        $laQte = (int) $_POST["qte"];
        if($laQte > 10) {
            $laQte = 10;
        }
        elseif ($laQte < 0) {
            $laQte = 0;
        }
        if($lArticle !== null) {
            //l'article existe
            $lArticle->setQuantite($laQte);
            $lArticle->updateLaQuantite();
        }
        else {
            //l'article n'existe pas
            $nouvelArticle = new Article();
            $nouvelArticle->setQuantite($laQte);
            $nouvelArticle->setIdProduit($idProduit);
            $nouvelArticle->setIdPanier($lePanier->getId());
            $nouvelArticle->inserer();
        }
        var_dump($lePanier);
        header('Location: index.php?controleur=site&action=panier');
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