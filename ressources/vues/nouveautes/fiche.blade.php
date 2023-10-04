@extends('gabarit')

@section('contenu')
<h3>Page fiche du participant</h3>
<ul>
    <li>Id: {{$participant->getId()}}</li>
    <li>Prénom: {{$participant->getPrenom()}}</li>
    <li>Nom: {{$participant->getNom()}}</li>
    <li>Sexe: {{$participant->getSexe()}}</li>
    <li>Âge: {{$participant->getAge()}}</li>
    <li>No de téléphone: {{$participant->getTelephone()}}</li>
    <li>Activité: {{$activite->getNom()}}</li>
    <ul>
        <li>Id de l'activité: {{$participant->getActiviteId()}}</li>
        <li>Description de l'activité: {{$activite->getDescription()}}</li>
        <li>Catégorie de l'activité: {{$categorie->getNom()}}</li>
        <li>Niveau de l'activité: {{$niveau->getNom()}}</li>
        <li>Ville de l'activité: {{$ville->getNom()}}</li>
        <li>Région de l'activité: {{$region->getNom()}}</li>
    </ul>
</ul>
@endsection