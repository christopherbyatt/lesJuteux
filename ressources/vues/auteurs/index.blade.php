@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page index des auteurs  --}}
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > Auteurs</p>
    <h1>Liste des auteurs</h1>
    <div class="auteurs">
        @foreach($auteurs as $auteur)
            <div class="auteurs__fiche">
            <a href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getId()}}">
                <img src="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg">
            </a>
                <p class="auteurs__nom">{{$auteur->getPrenomNom()}}</p>
            </div>
        @endforeach
    </div>
@endsection