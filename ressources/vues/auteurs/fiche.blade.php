@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page fiche de l'auteur  --}}
    <div class="ficheArtiste">
    <h2>Information sur {{$auteur->getPrenomNom()}}</h2>
        <img class="ficheArtiste__photo" src="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg" alt="photo de {{$auteur->getPrenomNom()}}">
        <h2>Bibliographie</h2>
        <p class="ficheArtiste__biblio">{{$auteur->getNotice()}}</p>
        <h2>Site web</h2>
        <p class="ficheArtiste__url"><a href="{{$auteur->getSiteWeb()}}">{{$auteur->getSiteWeb()}}</a></p>
    </div>
    <h2>Livres de l'auteur</h2>
@endsection
