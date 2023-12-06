
@extends('gabarit', ['title'=>'À propos', 'description'=>'Apprenez-en plus à-propos de La Pastèque, une maison d\'édition québecoise. Découvrez son origine, ses prix, ses services et plus encore.', 'keywords'=>['à-propos', 'maison d\'édition', 'librairie', 'livres', 'auteurs', 'origine', 'début', 'québecois', 'La Pastèque']])

@section('contenu')
    <h3>Contenu: {{$message}}</h3>
@endsection