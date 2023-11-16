@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page index des auteurs  --}}
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > Auteurs</p>
    <div class="affichage">
        <button class="btnListe" id="btnListe"></button>
        <button class="btnGrille selected" id="btnGrille"></button>
    </div>
    <h1>Liste des auteurs</h1>
    <div class="auteurs grille" id="auteurs">
        @foreach($auteurs as $auteur)
            <div class="auteurs__fiche mode-grille" id="auteurs__fiche">
            <a href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getId()}}">
                @if(is_file("liaisons/images/auteurs/".$auteur->getId()."_w325.jpg"))
                <img class="auteurs__img imgAuteur" src="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg">
                @else
                    <img src="liaisons/images/auteurs/noImage_w325.jpg" class="imgAuteur">
                @endif
            </a>
                <div class="infosAuteur" id="infosAuteur">
                <p class="auteurs__nom">{{$auteur->getPrenomNom()}}</p>
                </div>
            </div>
        @endforeach

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
    </div>
    @endif
@endsection