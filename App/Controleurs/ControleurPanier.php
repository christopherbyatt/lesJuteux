<?php

namespace App\Controleurs;
use App\App;
class ControleurPanier
{
    public function index():void{
        echo App::getBlade()->run("panier.index");
    }
}