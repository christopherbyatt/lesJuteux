@extends('gabarit', ['title'=>'Mon panier'])
@section('contenu')
    <h1>Mon Panier</h1>
    <div class="panier">
        <div>
        <img src="liaisons/images/livres/978897770105_w150.jpg">
        <p><a href="" class="livres__titre">Titre du livre ici</a></p>
        <p>Nom des auteurs ici</p>
        <p>11.11$</p>
        <a href="">Retirer du panier</a>
        </div>
        <div>
            <label for="chiffre"></label>
            <input type="number" id="chiffre" name="chiffre" value="1">
            <p>Total : 11.11$</p>
        </div>
    </div>
    <div class="panier">
        <div>
            <img src="liaisons/images/livres/978897770105_w150.jpg">
            <p><a href="" class="livres__titre">Titre du livre ici</a></p>
            <p>Nom des auteurs ici</p>
            <p>11.11$</p>
            <a href="">Retirer du panier</a>
        </div>
        <div>
            <label for="chiffre"></label>
            <input type="number" id="chiffre" name="chiffre" value="1">
            <p>Total : 11.11$</p>
        </div>
    </div>
@endsection
