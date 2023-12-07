@extends('gabarit', ['title'=>'Mon panier', 'description'=>'Accédez à votre panier, ajoutez-y des articles et passez au paiement rapidement et sécuriatairement.', 'keywords'=>['panier', 'livres', 'librairie', 'paiement', 'ajouter au panier', 'québecois', 'La Pastèque']])
@section('contenu')
    <h1>Mon Panier</h1>
    <div>
        @foreach($lesLivres as $unLivre)
            <li class="panier background">
                <div class="panier__info">
                    <img class="panier__info__img" src="liaisons/images/livres/{{$unLivre->getISBNPapier()}}_w150.jpg">
                    <div class="panier__info__txt">
                        <p class="panier__info__txt__p">{{$unLivre->getTitre()}}</p>
                        <p class="panier__info__txt__p">@foreach($unLivre->getAuteur() as $unAuteur)@if($loop->remaining)<br>@endif{{$unAuteur->getPrenomNom()}} @endforeach</p>
                        <p class="panier__info__txt__p">{{$unLivre->getPrixCan()}}$</p>
                    </div>
                </div>
                <div class="panier__quantitePrix">
                    <label for="chiffre">Quantité : </label>
                    <input type="number" id="chiffre" name="chiffre" value="{{\App\Modeles\Article::trouverParLivreEtPanier($unLivre->getId(), $lePanier->getId())->getQuantite()}}">
                    <p>Total : {{ number_format((float)($unLivre->getPrixCan()*\App\Modeles\Article::trouverParLivreEtPanier($unLivre->getId(), $lePanier->getId())->getQuantite()), 2, '.', '') }}$</p>
                    <a href="">Retirer du panier</a>
                </div>
            </li>
      @endforeach
    </div>
@endsection
