@extends('gabarit')

@section('contenu')
        <h3>Page index des participants</h3>
        <ul>
            @foreach($participants as $participant)
                <li><a href="index.php?controleur=participant&action=fiche&idParticipant={{$participant->getId()}}">{{$participant->getId()}}. {{$participant->getPrenom()}} {{$participant->getNom()}}</a></li>
            @endforeach
        </ul>
@endsection