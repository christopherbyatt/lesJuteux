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
                    @foreach($livre->getAuteur() as $auteur)
                    <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                    @endforeach
                    <p class="livres__auteurs">{{$livre->getPrenomNomAuteur()}}</p>
                    <p class="livres__titre">{{$livre->getTitre()}}</p>
                    <p class="livres__prix">{{$livre->getPrixCan()}}$</p>
                </div>
            @endforeach
        </div>
        @if($numeroPage < 1)
        <h2>Nouveautés</h2>
        <div class="livres">
            @foreach($livresNouveautes as $livreNouveaute)
                <div class="livres__fiche">
                    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livreNouveaute->getId()}}">
                        <img class="livres__fiche-nouveaute" src="liaisons/images/livres/{{$livreNouveaute->getISBNPapier()}}_w300.jpg">
                    </a>
                    @foreach($livre->getAuteur() as $auteur)
                        <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                    @endforeach
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
                    @foreach($livre->getAuteur() as $auteur)
                        <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                    @endforeach
                    <p class="livres__titre">{{$livreAVenir->getTitre()}}</p>
                    <p class="livres__prix">{{$livreAVenir->getPrixCan()}}$</p>
                </div>
            @endforeach
            </div>
{{--@endsection--}}
        @endif

<!-- Si on est pas sur la première page et s'il y a plus d'une page -->
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
    @endsection