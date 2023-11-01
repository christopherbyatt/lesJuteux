@extends('gabarit')

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
        <img src="liaisons/images/auteurs/{{$auteur->getId()}}_w520.jpg" alt="photo de {{$auteur->getPrenomNom()}}">
        </picture>
        @else
            <picture class="ficheArtiste__photo">
                <source media="(min-width:800px" srcset="liaisons/images/auteurs/noImage_w520.jpg">
                <source media="(max-width:799px" srcset="liaisons/images/auteurs/noImage_w325.jpg">
                <img src="liaisons/images/auteurs/noImage_w520.jpg" alt="photo de {{$auteur->getPrenomNom()}}">
        @endif
    </div>
    </div>
        <div class="ficheArtiste">
            <div class="ligne-h2">
        <h2 class="pale">Bibliographie</h2>
            </div>
        <p class="ficheArtiste__biblio">{{$auteur->getNotice()}}</p>
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
<h2 class="pale">Livres écrit par {{$auteur->getPrenomNom()}}</h2>
        </div>
    </div>
    <div class="auteursLivres">
        @foreach($auteur->getLivre() as $livre)
            <div class="auteursLivres__fiche">
            <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
                @if(is_file("liaisons/images/livres/".$livre->getISBNPapier()."_w150.jpg"))
                    <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w150.jpg">
                @else
                    <img src="liaisons/images/livres/noImage_w150.jpg">
                @endif
            </a>
                <p class="auteursLivres__titre">{{$livre->getTitre()}}</p>
                <p class="auteursLivres__prix">{{$livre->getPrixCan()}}$</p>
{{--                @foreach($livre->getReconnaissances() as $reconnaissance)--}}
{{--                    <p>{{$reconnaissance->getLaReconnaissance()}}</p>--}}
{{--                @endforeach--}}
            </div>
        @endforeach

    </div>

    </div>
@endsection
