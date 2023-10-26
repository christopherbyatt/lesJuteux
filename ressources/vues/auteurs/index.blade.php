@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page index des auteurs  --}}
    <h1>Liste des auteurs</h1>
    <div class="auteurs">
        @foreach($auteurs as $auteur)
            <div class="auteurs__fiche">
            <a href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getId()}}">
                @if(is_file("liaisons/images/auteurs/".$auteur->getId()."_w325.jpg"))
                <img src="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg">
                @else
                    <img src="liaisons/images/auteurs/noImage_w325.jpg">
                @endif
            </a>
                <p class="auteurs__nom">{{$auteur->getPrenomNom()}}</p>
            </div>
        @endforeach
    </div>
@endsection