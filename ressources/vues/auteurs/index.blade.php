
@extends('gabarit', ['title'=>'Index des auteurs', 'description'=>'Explorez nos divers auteurs talentueux qui ont participé à l\'écriture de nos livres disponibles en vente sur La Pastèque. Découvrez les œuvres, les biographies, les prix de multiples écrivains.' , 'keywords'=>['auteurs', 'écrivains', 'biographies', 'auteurs divers', 'québecois', 'La Pastèque']])

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > Auteurs</p>
    <div class="affichage">
        <button class="btnListe" id="btnListe"></button>
        <button class="btnGrille selected" id="btnGrille"></button>
    </div>
    <h1>Liste des auteurs</h1>
    <div class="auteurs grille" id="auteurs">
        @foreach($auteurs as $auteur)
            <div class="auteurs__fiche mode-grille" id="auteurs__fiche">
            <a href="index.php?controleur=auteur&action=fiche&idAuteur={{$auteur->getId()}}">
                @if(is_file("liaisons/images/auteurs/".$auteur->getId()."_w325.jpg"))
                    <img class="auteurs__img imgAuteur" src="liaisons/images/auteurs/{{$auteur->getId()}}_w325.jpg" alt="Portrait de {{$auteur->getPrenomNom()}}" title="Portrait de {{$auteur->getPrenomNom()}}">
                @else
                    <img class="imgAuteur" src="liaisons/images/auteurs/noImage_w325.jpg" alt="Image générique pour {{$auteur->getPrenomNom()}}" title="Image générique pour {{$auteur->getPrenomNom()}}">
                @endif
            </a>
                <div class="infosAuteur" id="infosAuteur">
                    <h2 class="auteurs__nom">{{$auteur->getPrenomNom()}}</h2>
                </div>
            </div>
        @endforeach
    </div>

    @include('fragments.pagination', ['numeroPage'=>$numeroPage, 'urlPagination'=>$urlPagination, 'nombreTotalPages'=>$nombreTotalPages])

@endsection