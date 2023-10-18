@extends('gabarit')

@section('contenu')
        <h1>Liste des livres</h1>
        <h2>Tous nos livres</h2>
        <div class="livres">
            @foreach($livres as $livre)
                <div class="livres__fiche">
                <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
                    <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w300.jpg">
                </a>
                    <p class="livres__auteurs">{{$livre->getPrenomNomAuteur()}}</p>
                    <p class="livres__titre">{{$livre->getTitre()}}</p>
                    <p class="livres__prix">{{$livre->getPrixCan()}}$</p>
                </div>
            @endforeach
        </div>
        <h2>Nouveautés</h2>
        <div class="livres">
            @foreach($livresNouveautes as $livreNouveaute)
                <div class="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livreNouveaute->getId()}}">
                        <img src="liaisons/images/livres/{{$livreNouveaute->getISBNPapier()}}_w300.jpg">
                    </a>
                    <p class="livres__auteurs">{{$livreNouveaute->getPrenomNomAuteur()}}</p>
                    <p class="livres__titre">{{$livreNouveaute->getTitre()}}</p>
                    <p class="livres__prix">{{$livreNouveaute->getPrixCan()}}$</p>
                </div>
            @endforeach
        </div>
        <h2>À venir</h2>
            <div class="livres">
            @foreach($livresAVenirs as $livreAVenir)
                <div class="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livreAVenir->getId()}}">
                        <img src="liaisons/images/livres/{{$livreAVenir->getISBNPapier()}}_w300.jpg">
                    </a>
                    <p class="livres__auteurs">{{$livreAVenir->getPrenomNomAuteur()}}</p>
                    <p class="livres__titre">{{$livreAVenir->getTitre()}}</p>
                    <p class="livres__prix">{{$livreAVenir->getPrixCan()}}$</p>
                </div>
            @endforeach
            </div>
@endsection