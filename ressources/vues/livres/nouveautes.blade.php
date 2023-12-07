
@extends('gabarit', ['title'=>'Index des nouveautés', 'description'=>'Explorez notre sélection de nouveaux livres. Arrivées depuis peu, faites parti des premiers à lire ces œuvres québecoises.', 'keywords'=>['nouveautés', 'livres', 'auteurs', 'librairie', 'québecois', 'La Pastèque']])

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > <a href="index.php?controleur=livre&action=index">Livres</a> > Nouveautés</p>
    <div class="affichage">
        <button class="btnListe" id="btnListe"></button>
        <button class="btnGrille selected" id="btnGrille"></button>
    </div>
    <h1>Nos nouveautés</h1>
    <div class="background">
        <div class="ligne-h2">
            <h2 class="fonce">Toutes nos nouveautés</h2>
        </div>
        <div class="livres grille" id="livres">
            @foreach($livres as $livre)
                    @include('fragments.lienLivre', ['livre'=>$livre])
            @endforeach
        </div>
    </div>
    <a class="lienTousLivres" href="index.php?controleur=livre&action=index">Voir tous nos livres</a>
    @include('fragments.pagination', ['numeroPage'=>$numeroPage, 'urlPagination'=>$urlPagination, 'nombreTotalPages'=>$nombreTotalPages])

@endsection