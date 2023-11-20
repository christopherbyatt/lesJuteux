@extends('gabarit', ['title'=>'Fiche de '.$livre->getTitre()])

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > <a href="index.php?controleur=livre&action=index">Livres</a> > {{$livre->getTitre()}}</p>
    <h1>{{$livre->getTitre()}}</h1>
    <ul class="icones_favoris">
        <a><li><img src="liaisons/images/favorisRose.png" class="icones_favoris-fiche"></li></a>
        <a><li><img src="liaisons/images/loupeFavoris.png" class="icones_favoris-fiche"></li></a>
    </ul>
    <ul class="elements_fiche">
        <div class="image_gauche">
            @if ($livre->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livre->getDateQuebec() < date('Y-m-d', time()))
                <div class="livreNouveautesEtiquette" style="margin-right: 10%; margin-bottom:-10px;><span class="brilleEtiquette"></span>Nouveauté</div>
            @elseif($livre->getDateQuebec() > date('Y-m-d', time()))
                <div class="livreAVenirEtiquette" style="margin-right: 10%; margin-bottom:-10px;"><span class="brilleEtiquette"></span>À venir</div>
            @else
                <div class="etiquetteVidePourReplirLEspace"></div>
            @endif

            @if(is_file("liaisons/images/livres/".$livre->getISBNPapier()."_w485.jpg"))
            <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w485.jpg">
            @else
            <img src="liaisons/images/livres/noImage_w485.jpg">
            @endif
{{--            <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w485.jpg">--}}
        </div>
        <div class="elements_droite">
            {{--    <li>Id: {{$livre->getId()}}</li>--}}
            <li class="categorie__livre">{{$categorie->getNom()}}</li>
            <li>Âge minimal: {{$livre->getAgeMin()}} ans</li>
            <p class="fiche__auteurs">
            @foreach($livre->getAuteur() as $auteur)
                <a class="lien-auteurs"
                            href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getAuteurId()}}">{{$auteur->getPrenomNom()}}</a>
            @endforeach
                </p>
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

            <div class="format__livre">
                <div class="format__papier">
                    <button class="papier format-selectionne" id="papier">Papier</button>
                </div>
                <div class="format__pdf">
                    <button class="pdf" id="pdf">PDF</button>
                </div>
            </div>

            <div class="quantite">
                <p class="moins" id="moins"></p>
{{--                <p class="chiffre">1</p>--}}
                <label for="chiffre"></label>
                <input type="number" id="chiffre" name="chiffre" value="1">
                <p class="plus" id="plus"></p>
            </div>

            <button class="btnAjouter" id="btnAjouter">Ajouter au panier</button>
            <p class="pConfirmation" id="pConfirmation"></p>
{{--            <li>Titre: {{$livre->getTitre()}}</li>--}}
{{--            <li>Arguments: {!! $livre->getArguments() !!}</li>--}}
{{--            <li>Statut: {{$livre->getStatut()}}</li>--}}
{{--            <li>Format: {{$livre->getFormat()}}</li>--}}
{{--            <li>Tirage: {{$livre->getTirage()}}</li>--}}
{{--            <li>Id Categorie: {{$livre->getCategorieId()}}</li>--}}
{{--            <li>Id type d'impression: {{$livre->getTypeImpressionId()}}</li>--}}
{{--            <li>Id type couverture: {{$livre->getTypeCouvertureId()}}</li>--}}
        </div>
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
                                    <img src="liaisons/images/livres/{{$book->getISBNPapier()}}_w300.jpg" class="imgLivre">
                                @else
                                    <img src="liaisons/images/livres/noImage_w300.jpg" class="imgLivre">
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