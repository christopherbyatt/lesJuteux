@extends('gabarit')

@section('contenu')
        <h1>Liste des livres</h1>
        <div class="background">
        <h2>Nouveauté</h2>
        <div class="livres">
            @foreach($livres as $livre)
                <div class="livres__fiche">
                <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
                    <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w300.jpg">
                </a>
                    <p class="livres__auteurs"></p>
                    <p class="livres__titre">{{$livre->getTitre()}}</p>
                    <p class="livres__prix">{{$livre->getPrixCan()}}$</p>
                </div>
            @endforeach
        </div>
        </div>

@endsection