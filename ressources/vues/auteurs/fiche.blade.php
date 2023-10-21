@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page fiche de l'auteur  --}}
    <h2>Information sur {{$auteur->getPrenomNom()}}</h2>
    <ul>
        <img src="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg">
{{--        <li>Id: {{$auteur->getId()}}</li>--}}
{{--        <li>Prénom: {{$auteur->getPrenom()}}</li>--}}
{{--        <li>Nom: {{$auteur->getNom()}}</li>--}}
        <li>Bibliographie: {{$auteur->getNotice()}}</li>
        <li>Site web: <a href="{{$auteur->getSiteWeb()}}">{{$auteur->getSiteWeb()}}</a></li>
    </ul>
    <h2>Livres de l'auteur</h2>
    <ul>
    </ul>
@endsection
