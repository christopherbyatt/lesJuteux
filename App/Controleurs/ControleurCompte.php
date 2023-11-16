<?php

namespace App\Controleurs;
use App\App;
class ControleurCompte
{
    public function connexion():void {
        echo App::getBlade()->run("compte.connexion");
    }
    public  function creation():void {
        echo App::getBlade()->run("compte.creation");
    }
}