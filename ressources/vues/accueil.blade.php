@extends('gabarit')

@section('contenu')
    <h1>Accueil</h1>
    <div class="background">
    <div class="ligne-h2">
        <h2 class="fonce">Nouveautés</h2>
    </div>
    <div class="livres">
        @for($i=0;$i<3;$i++)
            <div class="livres__fiche">
                <a href="index.php?controleur=livre&action=fiche&idLivre={{$livresNouveautes[$i]->getId()}}">
                    @if ($livresNouveautes[$i]->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livresNouveautes[$i]->getDateQuebec() < date('Y-m-d', time()))
                        <div class="livreNouveautesEtiquette">Nouveauté</div>
                    @elseif($livresNouveautes[$i]->getDateQuebec() > date('Y-m-d', time()))
                        <div class="livreAVenirEtiquette">À venir</div>
                    @else
                        <div class="etiquetteVidePourReplirLEspace"></div>
                    @endif
                    <img class="livres__fiche-nouveaute" src="liaisons/images/livres/{{$livresNouveautes[$i]->getISBNPapier()}}_w300.jpg">
                </a>
                @foreach($livresNouveautes[$i]->getAuteur() as $auteur)
                    <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                @endforeach
                <p class="livres__titre">{{$livresNouveautes[$i]->getTitre()}}</p>
                <p class="livres__prix">{{$livresNouveautes[$i]->getPrixCan()}}$</p>
            </div>
        @endfor
    </div>
    </div>
        <div class="ligne-h2">
            <h2 class="pale">À venir</h2>
        </div>
        <div class="livres">
            @for($i=0;$i<3;$i++)
                <div class="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livresAVenirs[$i]->getId()}}">
                        @if ($livresAVenirs[$i]->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livresAVenirs[$i]->getDateQuebec() < date('Y-m-d', time()))
                            <div class="livreNouveautesEtiquette">Nouveauté</div>
                        @elseif($livresAVenirs[$i]->getDateQuebec() > date('Y-m-d', time()))
                            <div class="livreAVenirEtiquette">À venir</div>
                        @else
                            <div class="etiquetteVidePourReplirLEspace"></div>
                        @endif
                        <img src="liaisons/images/livres/{{$livresAVenirs[$i]->getISBNPapier()}}_w300.jpg">
                    </a>
                    @foreach($livresAVenirs[$i]->getAuteur() as $auteur)
                        <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                    @endforeach
                    <p class="livres__titre">{{$livresAVenirs[$i]->getTitre()}}</p>
                    <p class="livres__prix">{{$livresAVenirs[$i]->getPrixCan()}}$</p>
                </div>
            @endfor
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