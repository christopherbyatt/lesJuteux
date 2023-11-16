@extends('gabarit')

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > Livres</p>
    <div class="affichage">
        <button class="btnListe" id="btnListe"></button>
        <button class="btnGrille selected" id="btnGrille"></button>
    </div>
        <h1>Liste des livres</h1>
    <div class="background">
        <div class="ligne-h2">
            <h2 class="fonce">Tous nos livres</h2>
        </div>
    @include('livres.filtres')
        <div class="livres grille" id="livres">
            @foreach($livres as $livre)
                <div class="livres__fiche mode-grille" id="livres__fiche">
                <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
                    @if ($livre->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livre->getDateQuebec() < date('Y-m-d', time()))
                        <div class="livreNouveautesEtiquette">Nouveauté</div>
                    @elseif($livre->getDateQuebec() > date('Y-m-d', time()))
                        <div class="livreAVenirEtiquette">À venir</div>
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
        @if($numeroPage < 1)
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

            <div class="ligne-h2">
                <h2 class="pale">Nouveautés</h2>
            </div>
            <div class="livres grille" id="livres">
            @foreach($livresNouveautes as $livreNouveaute)
                <div class="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livreNouveaute->getId()}}">
                        @if ($livreNouveaute->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livreNouveaute->getDateQuebec() < date('Y-m-d', time()))
                            <div class="livreNouveautesEtiquette">Nouveauté</div>
                        @elseif($livreNouveaute->getDateQuebec() > date('Y-m-d', time()))
                            <div class="livreAVenirEtiquette">À venir</div>
                        @else
                            <div class="etiquetteVidePourReplirLEspace"></div>
                        @endif
                        <img class="livres__fiche-nouveaute" src="liaisons/images/livres/{{$livreNouveaute->getISBNPapier()}}_w300.jpg">
                    </a>
                    <div class="infosLivre" id="infosLivre">
                    @foreach($livreNouveaute->getAuteur() as $auteur)
                        <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                    @endforeach
                    <p class="livres__titre">{{$livreNouveaute->getTitre()}}</p>
                    <p class="livres__prix">{{$livreNouveaute->getPrixCan()}}$</p>
                    </div>
                </div>
            @endforeach
        </div>
            <div class="background">
            <div class="ligne-h2">
                <h2 class="fonce">À venir</h2>
            </div>
            <div class="livres">
            @foreach($livresAVenirs as $livreAVenir)
                <div class="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livreAVenir->getId()}}">
                        @if ($livreAVenir->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livreAVenir->getDateQuebec() < date('Y-m-d', time()))
                            <div class="livreNouveautesEtiquette">Nouveauté</div>
                        @elseif($livreAVenir->getDateQuebec() > date('Y-m-d', time()))
                            <div class="livreAVenirEtiquette">À venir</div>
                        @else
                            <div class="etiquetteVidePourReplirLEspace"></div>
                        @endif
                        <img src="liaisons/images/livres/{{$livreAVenir->getISBNPapier()}}_w300.jpg" class="imgAVenir">
                    </a>
                    <div class="infosLivre" id="infosLivre">
                    @foreach($livreAVenir->getAuteur() as $auteur)
                        <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                    @endforeach
                    <p class="livres__titre">{{$livreAVenir->getTitre()}}</p>
                    <p class="livres__prix">{{$livreAVenir->getPrixCan()}}$</p>
                    </div>
                </div>
            @endforeach
            </div>
            </div>
{{--@endsection--}}
        @endif

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
    @endsection