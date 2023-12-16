
@extends('gabarit', ['title'=>'Fiche de '.$livre->getTitre(), 'description'=>'Découvrez le livre '.$livre->getTitre().'. Lisez la description, voyez le prix, ajoutez le à votre panier chez La Pastèque', 'keywords'=>['ajouter au panier', 'prix', 'livre', $livre->getTitre(), 'québecois', 'La Pastèque']])

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > <a href="index.php?controleur=livre&action=index">Livres</a> > {{$livre->getTitre()}}</p>
    <h1>{{$livre->getTitre()}}</h1>
    <ul class="icones_favoris">
        <a><li id="icon_favoris-rose"><img alt="Ajouter aux favoris" src="liaisons/images/favorisRose.png" class="icones_favoris-fiche"></li></a>
        <a><li><img alt="Voir ma liste de favoris" src="liaisons/images/loupeFavoris.png" class="icones_favoris-fiche"></li></a>
    </ul>
    <ul class="elements_fiche">
        <li class="image_gauche">
            @if ($livre->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livre->getDateQuebec() < date('Y-m-d', time()))
                <div class="livreNouveautesEtiquette" style="margin-right: 10%; margin-bottom:-10px;"><span class="brilleEtiquette"></span>Nouveauté</div>
            @elseif($livre->getDateQuebec() > date('Y-m-d', time()))
                <div class="livreAVenirEtiquette" style="margin-right: 10%; margin-bottom:-10px;"><span class="brilleEtiquette"></span>À venir</div>
            @else
                <div class="etiquetteVidePourReplirLEspace"></div>
            @endif

            @if(is_file("liaisons/images/livres/".$livre->getISBNPapier()."_w485.jpg"))
            <img alt="Couverture de {{$livre->getTitre()}}" title="Couverture de {{$livre->getTitre()}}" src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w485.jpg">
            @else
            <img src="liaisons/images/livres/noImage_w485.jpg" alt="Couverture générique pour {{$livre->getTitre()}}" title="Couverture générique pour {{$livre->getTitre()}}">
            @endif
        </li>
        <li class="elements_droite">
            <ul>
            <li class="categorie__livre">{{$categorie->getNom()}}</li>
            <li>Âge minimal: {{$livre->getAgeMin()}} ans</li>
            @foreach($livre->getAuteur() as $auteur)
                <a class="lien-auteurs" href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getAuteurId()}}"><h2 class="lien-auteurs__h2">{{$auteur->getPrenomNom()}}</h2></a>
            @endforeach
            <li class="prixCAN__livre">{{$livre->getPrixCan()}} $</li>
            <li class="description__livre">{!! $livre->getLeLivre() !!}</li>

            <li>ISBN: {{$livre->getISBNPapier()}}</li>
            <li>Nombre de pages: {{$livre->getPagination()}}</li>
            <li>Type de couverture: {{$type_couverture->getNom()}}</li>
            <li>Type d'impression: {{$type_impression->getNom()}}</li>
            <li>Date de parution au Québec: {{$livre->getDateQuebec()}}</li>
            <li>Date de parution en France: {{$livre->getDateFrance()}} ({{$livre->getPrixEuro()}} €)</li>

            @if ($livre->getReconnaissances() != null)
            <div class="livre__reconnaissances">
            <h3 class="titreReconnaissances">Reconnaissances</h3>
            @foreach($livre->getReconnaissances() as $reconnaissance)
                <li class="uneReconnaissance">{!! $reconnaissance->getLaReconnaissance() !!}</li>
            @endforeach
            </div>
            @endif

            <form action="index.php?controleur=article&action=inserer&idLivre={{$_GET['idLivre']}}" method="POST" class="ficheLivre__form">
                <div class="ficheLivre__form__section">
                    <input type="radio" name="format" id="formatPapier" value="formatPapier" class="ficheLivre__form__section__radio visuallyhidden" checked>
                    <label for="formatPapier" class="ficheLivre__form__section__label" id="labelPapier">Papier</label>
                    <input type="radio" name="format" id="formatEpub" value="formatEpub" class="ficheLivre__form__section__radio visuallyhidden">
                    <label for="formatEpub" class="ficheLivre__form__section__label" id="labelEpub">EPUB</label>
                    <input type="radio" name="format" id="formatAudio" value="formatAudio" class="ficheLivre__form__section__radio visuallyhidden">
                    <label for="formatAudio" class="ficheLivre__form__section__label" id="labelAudio">Audio</label>
                    <input type="radio" name="format" id="formatPdf" value="formatPdf" class="ficheLivre__form__section__radio visuallyhidden">
                    <label for="formatPdf" class="ficheLivre__form__section__label" id="labelPdf">PDF</label>
                </div>
{{--                <div class="format__livre">--}}
{{--                    <div class="format__papier">--}}
{{--                        <button class="papier format-selectionne" id="papier">Papier</button>--}}
{{--                    </div>--}}
{{--                    <div class="format__pdf">--}}
{{--                        <button class="pdf" id="pdf">PDF</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @php
                    if(\App\Modeles\Article::trouverParLivreEtPanier((int)$_GET['idLivre'],\App\App::getPanier()->getId()) !== null) {
                        $laQuantite = \App\Modeles\Article::trouverParLivreEtPanier((int)$_GET['idLivre'],\App\App::getPanier()->getId())->getQuantite();
                    }
                    else {
                        $laQuantite = 1;
                    }
                @endphp
                <fieldset class="ficheLivre__form__quantite">
                    <legend>Quantité: </legend>
                    <button type="button" id="btnMoins" class="ficheLivre__form__quantite__btn">-</button>
                    <label for="inputQteFicheLivre" class="visuallyhidden">Quantité</label>
                    <input type="number" name="qteLivres" id="inputQteFicheLivre" min="0" value="{{$laQuantite}}" class="ficheLivre__form__quantite__input">
                    <button type="button" id="btnPlus" class="ficheLivre__form__quantite__btn">+</button>
                </fieldset>

{{--                <div class="quantite">--}}
{{--                    <p class="moins" id="moins"></p>--}}
{{--                    <label for="chiffre"></label>--}}
{{--                    <input type="number" id="chiffre" name="chiffre" value="1">--}}
{{--                    <p class="plus" id="plus"></p>--}}
{{--                </div>--}}

{{--                <input type="submit" class="btnAjouter" id="btnAjouter" value="Ajouter au panier">--}}
{{--                    <span id="icon_panier" class="icon"></span>--}}
                @if($livre->getDateQuebec() > date('Y-m-d', time()))
                    <p id="txtAjouter" class="ficheLivre__form__txtAjouter">Ajouter au panier<span class="icon" id="icon_panier_btn"></span></p>
                    <p class="ficheLivre__form__txtAvertissement">Malheureusement cet article n'est pas encore disponible. La date de sortie prévue est le {{ date('d/m/Y', strtotime((string)$livre->getDateQuebec())) }}.</p>
                @else
                    <button type="submit" id="btnAjouter" class="ficheLivre__form__btnAjouter">Ajouter au panier<span class="icon" id="icon_panier_btn"></span></button>
                @endif
            </form>

            <!-- Modal inspiré de: https://www.w3schools.com/howto/howto_css_modals.asp -->

            <!-- The Modal -->
            <div id="myModal" class="modal @if(isset($_GET['popUp']) && $_GET['popUp'] === 'true') " @else cache" hidden aria-hidden @endif>

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                    </div>
{{--                    <div class="modal-body-top">--}}
                    <div class="modal-body" id="modal-body">
{{--                        <p class="modal-texte"></p>--}}
                        <script src="liaisons/js/modal.js"></script>
                        <script>window.onload = function () {creerModal();}</script>
                    </div>
                    <a class="modal-lien" href="index.php?controleur=panier&action=index">Voir le panier</a>
{{--                    </div>--}}
                    <div class="modal-footer">
                    </div>
                </div>

            </div>

            <p class="pConfirmation" id="pConfirmation"></p>
{{--            <li>Titre: {{$livre->getTitre()}}</li>--}}
{{--            <li>Arguments: {!! $livre->getArguments() !!}</li>--}}
{{--            <li>Statut: {{$livre->getStatut()}}</li>--}}
{{--            <li>Format: {{$livre->getFormat()}}</li>--}}
{{--            <li>Tirage: {{$livre->getTirage()}}</li>--}}
{{--            <li>Id Categorie: {{$livre->getCategorieId()}}</li>--}}
{{--            <li>Id type d'impression: {{$livre->getTypeImpressionId()}}</li>--}}
{{--            <li>Id type couverture: {{$livre->getTypeCouvertureId()}}</li>--}}
            </ul>
        </li>
    </ul>
<div class="background sectionSuggestions">
    <div class="ligne-h2">
        <h2 class="fonce">Également de cet auteur</h2>
    </div>
    <div class="auteursLivresAssocies">
        @foreach($livre->getAuteur() as $auteur)
            @foreach($auteur->getLivresAssocies() as $book)
                @if ($book->getId() != $livre->getId())
                        <div class="livres__fiche" id="livres__fiche">
                            <a href="index.php?controleur=livre&action=fiche&idLivre={{$book->getId()}}">
                                @if(is_file("liaisons/images/livres/".$book->getISBNPapier()."_w300.jpg"))
                                    <img src="liaisons/images/livres/{{$book->getISBNPapier()}}_w300.jpg" class="imgLivre" alt="Couverture de {{$book->getTitre()}}" title="Couverture de {{$book->getTitre()}}">
                                @else
                                    <img src="liaisons/images/livres/noImage_w300.jpg" class="imgLivre" alt="Couverture générique pour {{$book->getTitre()}}" title="Couverture générique pour {{$book->getTitre()}}">
                                @endif
                            </a>
                            <div class="infosLivre" id="infosLivre">
                                @foreach($book->getAuteur() as $auteur)
                                    <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
                                @endforeach
                                <p class="livres__titre">{{$book->getTitre()}}</p>
                                <p class="livres__prix">{{$book->getPrixCan()}}$</p>
                            </div>
                        </div>
                @endif
            @endforeach
        @endforeach
        </div>
    </div>
    <div class="changerLivre">
        <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId() - 1}}"><p>< Livre précédent</p></a>
        <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId() + 1}}"><p>Livre suivant ></p></a>
    </div>
@endsection