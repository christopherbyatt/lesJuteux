
@extends('gabarit', ['title'=>'Apprenez-en sur '.$auteur->getPrenomNom(), 'description'=>'Fiche de '.$auteur->getPrenomNom().', un auteur. Découvrez sa biographie, les prix reçus et les livres qui ont été écrits par cet écrivain.', 'keywords'=>['auteur', 'écrivains', 'biographie', 'livres', $auteur->getPrenomNom(), 'québecois', 'La Pastèque']])

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > <a href="index.php?controleur=auteur&action=index">Auteurs</a> > {{$auteur->getPrenomNom()}}</p>
    {{--  À modifier pour faire la page fiche de l'auteur  --}}
    <div class="background">
    <div class="ficheArtiste">
    <h1>Information sur {{$auteur->getPrenomNom()}}</h1>
        @if(is_file("liaisons/images/auteurs/".$auteur->getId()."_w520.jpg"))
        <picture class="ficheArtiste__photo">
            <source media="(min-width:800px" srcset="liaisons/images/auteurs/{{$auteur->getId()}}_w520.jpg">
            <source media="(max-width:799px" srcset="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg">
        <img src="liaisons/images/auteurs/{{$auteur->getId()}}_w520.jpg" alt="Photo de {{$auteur->getPrenomNom()}}" title="Photo de {{$auteur->getPrenomNom()}}">
        </picture>
        @else
            <picture class="ficheArtiste__photo">
                <source media="(min-width:800px" srcset="liaisons/images/auteurs/noImage_w520.jpg">
                <source media="(max-width:799px" srcset="liaisons/images/auteurs/noImage_w325.jpg">
                <img src="liaisons/images/auteurs/noImage_w520.jpg" alt="Photo de {{$auteur->getPrenomNom()}}" title="Photo de {{$auteur->getPrenomNom()}}">
        @endif
    </div>
    </div>
        <div class="ficheArtiste">
            <div class="ligne-h2">
        <h2 class="pale">Biographie</h2>
            </div>
        <div class="ficheArtiste__biblio">{!!$auteur->getNotice()!!}</div>
        </div>
    <div class="background">
    <div class="ficheArtiste">
        <div class="ligne-h2">
            <h2 class="fonce">Site web</h2>
        </div>
        <p class="ficheArtiste__url"><a href="{{$auteur->getSiteWeb()}}">{{$auteur->getSiteWeb()}}</a></p>
    </div>
    </div>
    <div class="ficheArtiste">
        <div class="ligne-h2">
            <h2 class="pale">Livres écrits par {{$auteur->getPrenomNom()}}</h2>
        </div>
    </div>
    <div class="auteursLivres">
        @foreach($auteur->getLivre() as $livre)
            <div class="auteursLivres__fiche">
                <h3 class="auteursLivres__titre">{{$livre->getTitre()}}</h3>
                <div class="auteursLivres__image">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
                @if(is_file("liaisons/images/livres/".$livre->getISBNPapier()."_w300.jpg"))
                    <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w300.jpg" alt="Couverture de {{$livre->getTitre()}}" title="Couverture de {{$livre->getTitre()}}">
                @else
                    <img src="liaisons/images/livres/noImage_w300.jpg" alt="Couverture de {{$livre->getTitre()}}" title="Couverture de {{$livre->getTitre()}}">
                @endif
                    </a>
                </div>
                <div class="auteursLivres__liste">
                    @if(count($livre->getReconnaissances())!=0)
                    <h4 class="auteursLivres__titreReco">Prix et reconnaissances</h4>
                    @endif
                @foreach($livre->getReconnaissances() as $reconnaissance)
                    <div class="auteursLivres__recon">{!! $reconnaissance->getLaReconnaissance()!!}</div>
                @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
