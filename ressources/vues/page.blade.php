@extends('gabarit', ['title'=>'Une page', 'description'=>'Ceci est un description. Important de remplir si on veut pas que ça plante', 'keywords'=>['important', 'mots clés', 'québecois', 'La Pastèque']])

@section('contenu')
    <h3>Contenu: {{$message}}</h3>
@endsection