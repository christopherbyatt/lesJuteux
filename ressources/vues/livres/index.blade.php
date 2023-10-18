@extends('gabarit')

@section('contenu')
        <h3>Tous les livres</h3>
        <ul>
            @foreach($livres as $livre)
                <li><a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">{{$livre->getTitre()}}</a></li>
            @endforeach
        </ul>
@endsection