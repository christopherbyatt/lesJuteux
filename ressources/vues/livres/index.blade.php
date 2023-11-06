@extends('gabarit')

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > Livres</p>
{{--    <div class="filtres-tri">--}}
{{--        <div class="tris">--}}
{{--            <form action="index.php?controleur=livre&action=index">--}}
{{--        <label for="tri"></label>--}}
{{--        <select name="tri" id="tri">--}}
{{--            <option disabled selected value="defaut" class="trierParDansSelect" style="color: #484141">↕≡</option>--}}
{{--            <option value="az-livre">Alphabétique de livre (A-Z)</option>--}}
{{--            <option value="za-livre">Anti-alphabétique de livre (Z-A)</option>--}}
{{--            <option value="az-auteur">Alphabétique d'auteur (A-Z)</option>--}}
{{--            <option value="za-auteur">Anti-alphabétique d'auteur (Z-A)</option>--}}
{{--            <option value="recent">Le plus récent</option>--}}
{{--            <option value="ancien">Le plus ancien</option>--}}
{{--        </select>--}}
{{--            <button type="submit" class="btnAppliquerTri">Appliquer</button>--}}
{{--            </form>--}}
{{--            </div>--}}
{{--    </div>--}}
    <div class="affichage">
        <button class="btnListe" id="btnListe"></button>
        <button class="btnGrille selected" id="btnGrille"></button>
    </div>
        <h1>Liste des livres</h1>
    <div class="background">
        <div class="ligne-h2">
            <h2 class="fonce">Tous nos livres</h2>
        </div>
        <div class="livres grille" id="livres">
            @foreach($livres as $livre)
                <div class="livres__fiche mode-grille" id="livres__fiche">
                <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
                    @if(is_file("liaisons/images/livres/".$livre->getISBNPapier()."_w300.jpg"))
                        <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w300.jpg">
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
                        <img src="liaisons/images/livres/{{$livreAVenir->getISBNPapier()}}_w300.jpg">
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

    @endsection