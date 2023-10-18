@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page fiche de l'auteur  --}}
    <h3>Page fiche de l'auteur</h3>
    <ul>
        <img src="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg">
        <li>Id: {{$auteur->getId()}}</li>
        <li>Prénom: {{$auteur->getPrenom()}}</li>
        <li>Nom: {{$auteur->getNom()}}</li>
        <li>Notice: {{$auteur->getNotice()}}</li>
        <li>Site web: {{$auteur->getSiteWeb()}}</li>
    </ul>
    <h3> Livres de l'auteur</h3>
    <ul>
    </ul>
@endsection
