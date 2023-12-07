@extends('gabarit', ['title'=>'Mon panier', 'description'=>'Accédez à votre panier, ajoutez-y des articles et passez au paiement rapidement et sécuriatairement.', 'keywords'=>['panier', 'livres', 'librairie', 'paiement', 'ajouter au panier', 'québecois', 'La Pastèque']])
@section('contenu')
    <h1>Mon Panier</h1>
    <ul class="panier">
        @php
            $leTotal = 0;
        @endphp
        @foreach($lesLivres as $unLivre)
            <li class="panier__item background">
                <div class="panier__item__info">
                    <img class="panier__item__info__img" src="liaisons/images/livres/{{$unLivre->getISBNPapier()}}_w150.jpg">
                    <div class="panier__item__info__txt">
                        <h2 class="panier__item__info__txt__h2">{{$unLivre->getTitre()}}</h2>
                        <p class="panier__item__info__txt__p">@foreach($unLivre->getAuteur() as $unAuteur){{$unAuteur->getPrenomNom()}} @if(!$loop->last)<br>@endif @endforeach</p>
                        <p class="panier__item__info__txt__p">{{$unLivre->getPrixCan()}}$</p>
                    </div>
                </div>
                <div class="panier__item__quantitePrix">
                    @php
                        $qte =  \App\Modeles\Article::trouverParLivreEtPanier($unLivre->getId(), $lePanier->getId())->getQuantite();
                        $leTotal = $leTotal + ($qte*$unLivre->getPrixCan());
                    @endphp
                    <label for="chiffre">Quantité : </label>
                    <input type="number" id="chiffre" name="chiffre" value="{{$qte}}">
                    <p>Total : {{ number_format((float)($unLivre->getPrixCan()*$qte), 2, '.', '') }}$</p>
                    <a href="">Retirer du panier</a>
                </div>
            </li>
            @if(!$loop->last)
                <div class="ligne-h2 panier__ligne"></div>
            @endif
      @endforeach
    </ul>
    <div class="total">
        @if($leTotal > 60)
            @php
                $livraison = 0;
            @endphp
        @else
            @php
                $livraison = 15;
            @endphp
        @endif
        <p>Sous-total: {{ number_format((float)($leTotal), 2, '.', '')  }}$</p>
        <p>Livraison: {{ number_format((float)($livraison), 2, '.', '')  }}$</p>
        <p>TPS: {{ number_format((float)(($leTotal+$livraison)*5/100), 2, '.', '')  }}$</p>
        <p>TVQ: {{ number_format((float)(($leTotal+$livraison)*9.975/100), 2, '.', '')  }}$</p>
        <p>Total: {{ number_format((float)($leTotal + $livraison + (($leTotal+$livraison)*9.975/100) + (($leTotal+$livraison)*5/100) ), 2, '.', '')  }}$</p>
    </div>
@endsection
