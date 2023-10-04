@extends('gabarit')

@section('contenu')
    {{--  À modifier pour faire la page fiche de l'auteur  --}}
    <h3>Page fiche de l'auteur</h3>
    <ul>
        <li>Id: {{$auteur->getId()}}</li>
        <li>Prénom: {{$auteur->getPrenom()}}</li>
        <li>Nom: {{$auteur->getNom()}}</li>
        <li>Notice: {{$auteur->getNotice()}}</li>
        <li>Site web: {{$auteur->getSiteWeb()}}</li>
{{--        <li>Livres de l'auteurs: </li>--}}
{{--        <ul>--}}
{{--            @foreach($participants as $participant)--}}
{{--                <li>{{$participant->getPrenom()}} {{$participant->getNom()}}</li>--}}
{{--            @endforeach--}}
{{--            @if(count($participants) == 0)--}}
{{--                <li>Aucun</li>--}}
{{--            @endif--}}
{{--        </ul>--}}
    </ul>
@endsection