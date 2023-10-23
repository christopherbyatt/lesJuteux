@extends('gabarit')

@section('contenu')
    <p class="filAriane">La Pastèque > Livres > {{$livre->getTitre()}}</p>
<h1>{{$livre->getTitre()}}</h1>
<ul class="elements_fiche">
    <div class="image_gauche">
        <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w485.jpg">
    </div>
    <div class="elements_droite">
    <li>Id: {{$livre->getId()}}</li>
    @foreach($livre->getAuteur() as $auteur)
        <p>Auteurs : <a href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getAuteurId()}}">{{$auteur->getPrenomNom()}}</a></p>
    @endforeach
    <li>ISBN papier: {{$livre->getISBNPapier()}}</li>
    <li>Titre: {{$livre->getTitre()}}</li>
    <li>Le livre: {!! $livre->getLeLivre() !!}</li>
    <li>Arguments: {!! $livre->getArguments() !!}</li>
    <li>Statut: {{$livre->getStatut()}}</li>
    <li>Pagination: {{$livre->getPagination()}}</li>
    <li>Âge minimal: {{$livre->getAgeMin()}}</li>
    <li>Format: {{$livre->getFormat()}}</li>
    <li>Tirage: {{$livre->getTirage()}}</li>
    <li>Prix canadien: {{$livre->getPrixCan()}}</li>
    <li>Prix français: {{$livre->getPrixEuro()}}</li>
    <li>Date de parution au Québec: {{$livre->getDateQuebec()}}</li>
    <li>Date de parution en France: {{$livre->getDateFrance()}}</li>
    <li>Id Categorie: {{$livre->getCategorieId()}}</li>
    <li>Id type d'impression: {{$livre->getTypeImpressionId()}}</li>
    <li>Id type couverture: {{$livre->getTypeCouvertureId()}}</li>
    </div>
</ul>
@endsection