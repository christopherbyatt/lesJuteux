@extends('gabarit')

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > <a href="index.php?controleur=livre&action=index">Livres</a> > {{$livre->getTitre()}}</p>
    <h1>{{$livre->getTitre()}}</h1>
    <ul class="elements_fiche">
        <div class="image_gauche">
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
            @foreach($livre->getAuteur() as $auteur)
                <p><a
                            href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getAuteurId()}}">{{$auteur->getPrenomNom()}}</a>
                </p>
            @endforeach
            <li class="prixCAN__livre">{{$livre->getPrixCan()}} $</li>
            <li class="description__livre">{!! $livre->getLeLivre() !!}</li>

            <li>ISBN: {{$livre->getISBNPapier()}}</li>
            <li>Nombre de pages: {{$livre->getPagination()}}</li>
{{--            <li>Type de couverture: {{$type_couverture->getNom()}}</li>--}}
            <li>Date de parution au Québec: {{$livre->getDateQuebec()}}</li>
            <li>Date de parution en France: {{$livre->getDateFrance()}} ({{$livre->getPrixEuro()}} €)</li>

            <div class="format__livre">
                <div class="format__papier">
                    <p class="papier">Papier</p>
                </div>
                <div class="format__pdf">
                    <p class="pdf">PDF</p>
                </div>
            </div>

            <div class="quantite">
                <p class="moins">-</p>
                <p class="chiffre">1</p>
                <p class="plus">+</p>
            </div>

            <button class="btnAjouter">Ajouter au panier</button>
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
@endsection