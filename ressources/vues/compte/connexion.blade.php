@extends('gabarit')
@section('contenu')
    <h1>Se connecter</h1>
    <div class="background compte__background">
    <form action="index.php?controleur=site&action=accueil" class="compte" method="POST">
        <label for="courriel">Courriel</label>
        <input class="compte__champLong" type="text" id="courriel" name="courriel">
        <label for="motDePasse">Mot de passe</label>
        <input class="compte__barre" type="password" id="motDePasse" name="motDePasse">
        <input type="submit" value="SE CONNECTER">
    </form>
    </div>
    <div>
        <div class="ligne-h2">
        <h2 class="pale">Pas de compte chez La Pastèque?</h2>
        </div>
        <h3 class="compte__lien"><a href="index.php?controleur=compte&action=creation">Créer un compte</a></h3>
    </div>
@endsection