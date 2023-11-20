@extends('gabarit')
@section('contenu')
    <h1>Mon Panier</h1>
    <div class="panier background">
        <div class="panier__info">
        <img class="panier__image" src="liaisons/images/livres/978897770105_w150.jpg">
            <div class="panier__texte">
        <p class="panier__p"><a href="" class="livres__titre">Titre du livre ici</a></p>
        <p class="panier__p">Nom des auteurs ici</p>
        <p class="panier__p">11.11$</p>
            </div>
        </div>
        <div class="panier__quantitePrix">
            <label for="chiffre">Quantité : </label>
            <input type="number" id="chiffre" name="chiffre" value="1">
            <p>Total : 11.11$</p>
            <a href="">Retirer du panier</a>
        </div>
    </div>
    <div class="panier background">
        <div class="panier__info">
            <img class="panier__image" src="liaisons/images/livres/978897770105_w150.jpg">
            <div class="panier__texte">
            <p class="panier__p"><a href="" class="livres__titre">Titre du livre ici</a></p>
            <p class="panier__p">Nom des auteurs ici</p>
            <p class="panier__p">11.11$</p>
            </div>
        </div>
        <div class="panier__quantitePrix">
            <label for="chiffre">Quantité : </label>
            <input type="number" id="chiffre" name="chiffre" value="1">
            <p>Total : 11.11$</p>
            <a href="">Retirer du panier</a>
        </div>
    </div>
@endsection
