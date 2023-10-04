@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page index des auteurs  --}}
    <h3>Page index des auteurs</h3>
    <ul>
        @foreach($auteurs as $auteur)
            <li><a href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getId()}}">{{$auteur->getId()}}. {{$auteur->getPrenom()}} {{$auteur->getNom()}}</a></li>
        @endforeach
    </ul>
@endsection