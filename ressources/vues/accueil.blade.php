@extends('gabarit')

@section('contenu')
    <h1>Accueil</h1>
    <div class="background">
    <div class="ligne-h2">
        <h2 class="fonce">Nouveautés</h2>
    </div>
    <div class="livres">
        @foreach($livresNouveautes as $livreNouveaute)
            <div class="livres__fiche">
                <a href="index.php?controleur=livre&action=fiche&idLivre={{$livreNouveaute->getId()}}">
                    <img class="livres__fiche-nouveaute" src="liaisons/images/livres/{{$livreNouveaute->getISBNPapier()}}_w300.jpg">
                </a>
                @foreach($livreNouveaute->getAuteur() as $auteur)
                    <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                @endforeach
                <p class="livres__titre">{{$livreNouveaute->getTitre()}}</p>
                <p class="livres__prix">{{$livreNouveaute->getPrixCan()}}$</p>
            </div>
        @endforeach
    </div>
    </div>
        <div class="ligne-h2">
            <h2 class="pale">À venir</h2>
        </div>
        <div class="livres">
            @foreach($livresAVenirs as $livreAVenir)
                <div class="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livreAVenir->getId()}}">
                        <img src="liaisons/images/livres/{{$livreAVenir->getISBNPapier()}}_w300.jpg">
                    </a>
                    @foreach($livreAVenir->getAuteur() as $auteur)
                        <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                    @endforeach
                    <p class="livres__titre">{{$livreAVenir->getTitre()}}</p>
                    <p class="livres__prix">{{$livreAVenir->getPrixCan()}}$</p>
                </div>
            @endforeach
        </div>
    <div>
        <div class="background">
            <div class="ligne-h2">
                <h2 class="fonce">Actualités</h2>
            </div>
        <div class="actualite">
            <div class="actualite__largeur">
                <div class="actualite__info">
                @foreach($actualites as $actualite)
                    <h3>{{$actualite->getTitre()}}</h3>
                        <small>{{$actualite->getDate()}}</small>
                    <p>{{$actualite->getLActualite()}}</p>
                @endforeach
                </div>
    </div>
    <div class="ligne-h2">
        <h2 class="pale">Événements</h2>
    </div>
    <div class="evenement">
        <div class="evenement__largeur">
            <div class="evenement__info">
                @foreach($evenenents as $evenement)
                    <h3>{{$evenement->getTitre()}}</h3>
                    <small>{{$evenement->getDate()}}</small>
                    <p>{{$evenement->getLEvenement()}}</p>
                @endforeach
            </div>
    </div>
@endsection