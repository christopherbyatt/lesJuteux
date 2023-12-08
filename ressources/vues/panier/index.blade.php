@extends('gabarit', ['title'=>'Mon panier', 'description'=>'Accédez à votre panier, ajoutez-y des articles et passez au paiement rapidement et sécuriatairement.', 'keywords'=>['panier', 'livres', 'librairie', 'paiement', 'ajouter au panier', 'québecois', 'La Pastèque']])
@section('contenu')
    <h1>Mon Panier</h1>
    @php
        $leTotal = 0;
    @endphp
    @if(count($lesLivres) === 0)
        <div class="panierVide">
            <div class="ligne-h2">
                <h2 class="fonce">Oops!</h2>
            </div>
            <p>Il semblerait que vous n'ayez rien ajouté à votre panier.</p>
            <p>Rendez-vous sur <a href="index.php?controleur=livre&action=index">la page de nos livres</a> pour en ajouter à votre panier et passer la commande.</p>
        </div>
    @else
        <ul class="panier">
            @foreach($lesLivres as $unLivre)
                <li class="panier__item background">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$unLivre->getId()}}" class="panier__item__info">
                        @if(is_file("liaisons/images/livres/".$unLivre->getISBNPapier()."_w300.jpg"))
                            <img class="panier__item__info__img" src="liaisons/images/livres/{{$unLivre->getISBNPapier()}}_w150.jpg">
                        @else
                            <img class="panier__item__info__img" src="liaisons/images/livres/noImage_w150.jpg">
                        @endif

                        <div class="panier__item__info__txt">
                            <h2 class="panier__item__info__txt__h2">{{$unLivre->getTitre()}}</h2>
                            <p class="panier__item__info__txt__p">@foreach($unLivre->getAuteur() as $unAuteur){{$unAuteur->getPrenomNom()}} @if(!$loop->last)<br>@endif @endforeach</p>
                            <p class="panier__item__info__txt__p">{{$unLivre->getPrixCan()}}$</p>
                        </div>
                    </a>
                    <div class="panier__item__quantitePrix">
                        @php
                            $qte =  \App\Modeles\Article::trouverParLivreEtPanier($unLivre->getId(), $lePanier->getId())->getQuantite();
                            $leTotal = $leTotal + ($qte*$unLivre->getPrixCan());
                        @endphp
                        <label for="chiffre">Quantité : </label>
                        <input type="number" id="chiffre" name="chiffre" value="{{$qte}}">
                        <p>Total : {{ number_format((float)($unLivre->getPrixCan()*$qte), 2, '.', '') }}$</p>
                        <a href="index.php?controleur=article&action=supprimer&idLivre={{$unLivre->getId()}}">Retirer du panier</a>
                    </div>
                </li>
                @if(!$loop->last)
                    <div class="ligne-h2 panier__ligne"></div>
                @endif
            @endforeach
        </ul>
        <div class="total">
            @if($leTotal > 60 || count($lesLivres) === 0)
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
            <a href="index.php?controleur=site&action=paiement">Passer au paiement</a>
        </div>
    @endif
@endsection
