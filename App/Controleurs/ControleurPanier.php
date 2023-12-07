<?php

namespace App\Controleurs;
use App\App;
use App\Modeles\Article;
use App\Modeles\Livre;

class ControleurPanier
{
    public function index():void{
        $lePanier = App::getPanier();
        $lesArticles = Article::trouverParIdPanier($lePanier->getId());
        $lesLivres = array();
        foreach ($lesArticles as $unArticle) {
            $unLivre = Livre::trouverParId($unArticle->getIdLivre());
            array_push($lesLivres, $unLivre);
        }

        $tDonnees = array("message"=>"Je suis la page Panier...", "lePanier"=>$lePanier, "lesArticles"=>$lesArticles, "lesLivres"=>$lesLivres);
        echo App::getBlade()->run("panier.index", $tDonnees);
    }
}