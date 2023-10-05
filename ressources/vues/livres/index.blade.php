@extends('gabarit')

@section('contenu')
        <h3>Page index des participants</h3>
        <ul>
            @foreach($livres as $livre)
                <li><a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">{{$livre->getId()}}. {{$livre->getTitre()}}</a></li>
            @endforeach
        </ul>
@endsection