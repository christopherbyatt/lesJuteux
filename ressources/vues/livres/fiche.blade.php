@extends('gabarit')

@section('contenu')
<h3>Page fiche du livre</h3>
<ul>
    <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w485.jpg">
    <li>Id: {{$livre->getId()}}</li>
    <li>ISBN papier: {{$livre->getISBNPapier()}}</li>
    <li>Titre: {{$livre->getTitre()}}</li>
    <li>Nom: {{$livre->getNomAuteur()}}</li>
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
</ul>
@endsection