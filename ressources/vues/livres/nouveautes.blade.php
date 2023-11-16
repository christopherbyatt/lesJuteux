@extends('gabarit')

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > <a href="index.php?controleur=livre&action=index">Livres</a> > Nouveautés</p>
    <div class="affichage">
        <button class="btnListe" id="btnListe"></button>
        <button class="btnGrille selected" id="btnGrille"></button>
    </div>
    <h1>Nos nouveautés</h1>
    <div class="background">
        <div class="ligne-h2">
            <h2 class="fonce">Toutes nos nouveautés</h2>
        </div>
        <div class="livres grille" id="livres">
            @foreach($livres as $livre)
                @if ($livre->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livre->getDateQuebec() > date('Y-m-d', time()))

                @endif
                <div class="livres__fiche mode-grille" id="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
                        @if ($livre->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livre->getDateQuebec() < date('Y-m-d', time()))
                            <div class="livreNouveautesEtiquette"><span class="brilleEtiquette"></span>Nouveauté</div>
                        @elseif($livre->getDateQuebec() > date('Y-m-d', time()))
                            <div class="livreAVenirEtiquette"><span class="brilleEtiquette"></span>À venir</div>
                        @else
                            <div class="etiquetteVidePourReplirLEspace"></div>
                        @endif
                        @if(is_file("liaisons/images/livres/".$livre->getISBNPapier()."_w300.jpg"))
                            <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w300.jpg" class="imgLivre">
                        @else
                            <img src="liaisons/images/livres/noImage_w300.jpg" class="imgLivre">
                        @endif
                    </a>
                    <div class="infosLivre" id="infosLivre">
                        @foreach($livre->getAuteur() as $auteur)
                            <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                        @endforeach
                        <p class="livres__titre">{{$livre->getTitre()}}</p>
                        <p class="livres__prix">{{$livre->getPrixCan()}}$</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <a class="lienTousLivres" href="index.php?controleur=livre&action=index">Voir tous nos livres</a>
        <!-- Si on est pas sur la première page et s'il y a plus d'une page -->
        <div class="pagination">
            @if ($numeroPage > 0)
                <a href= "{{ $urlPagination . "&page=" . 0  }}">Premier</a>
            @else
                <span style="color:#999">Premier</span> <!-- Bouton premier inactif -->
            @endif

            &nbsp;|&nbsp;

            @if ($numeroPage > 0)
                <a href="{{ $urlPagination . "&page=" . ($numeroPage - 1) }}">Précédent</a>
            @else
                <span style="color:#999">Précédent</span><!-- Bouton précédent inactif -->
            @endif

            &nbsp;|&nbsp;

            <!-- Statut de progression: page 9 de 99 -->
            {{"Page " . ($numeroPage +1) . " de " . ($nombreTotalPages +1)}}

            &nbsp;|&nbsp;

            <!-- Si on est pas sur la dernière page et s'il y a plus d'une page -->
            @if ($numeroPage < $nombreTotalPages)
                <a href="{{ $urlPagination . "&page=" . ($numeroPage + 1)  }}">Suivant</a>
            @else
                <span style="color:#999">Suivant</span><!-- Bouton suivant inactif -->
            @endif

            &nbsp;|&nbsp;

            @if ($numeroPage < $nombreTotalPages)
                <a href="{{ $urlPagination . "&page=" . $nombreTotalPages }}">Dernier</a>
            @else
                <span style="color:#999">Dernier</span><!-- Bouton dernier inactif -->
            @endif
        </div>

        {{--@endsection--}}

@endsection