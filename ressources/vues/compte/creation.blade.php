
@extends('gabarit', ['title'=>'Création du compte', 'description'=>'Connectez-vous ou créez-vous un compte chez La Pastèque pour des offres exclusives sur de multiples ouvrages québecois.', 'keywords'=>['compte', 'création', 'connexion', 'livres', 'bd', 'québecois', 'La Pastèque']])
@section('contenu')
    <h1>Créer un compte</h1>
    <div class="background compte__background">
    <form action="index.php?controleur=site&action=accueil" class="compte" method="POST">
        <label for="courriel">Courriel</label>
        <input class="compte__champLong compte__barre" type="text" id="courriel" name="courriel">
        <label for="motDePasse">Choisir un mot de passe</label>
        <input class="compte__barre" type="password" id="motDePasse" name="motDePasse">
        <input type="submit" value="CRÉER UN COMPTE">
    </form>
    </div>
    <div>
        <div class="ligne-h2">
        <h2 class="pale">Vous avez déjà un compte chez La Pastèque?</h2>
        </div>
        <h3 class="compte__lien"><a href="index.php?controleur=compte&action=connexion">Se connecter</a></h3>
    </div>
@endsection
