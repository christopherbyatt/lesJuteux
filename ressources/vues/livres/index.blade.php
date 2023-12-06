
@extends('gabarit', ['title'=>'Index des livres', 'description'=>'Explorez notre collection de divers livres chez La Pastèque. Du plus jeune au plus âgé, tous les membres de la famille trouveront des livres à leur goût.', 'keywords'=>['livres', 'bd', 'famille', 'librairie', 'enfant', 'québecois', 'La Pastèque']])

@section('contenu')
    <p class="filAriane"><a href="index.php?controleur=site&action=accueil">La Pastèque</a> > Livres</p>
    <div class="affichage">
        <button class="btnListe" id="btnListe"></button>
        <button class="btnGrille selected" id="btnGrille"></button>
    </div>
        <h1>Liste des livres</h1>
    <div class="background">
        <div class="ligne-h2">
            <h2 class="fonce">Tous nos livres</h2>
        </div>
    @include('fragments.filtresLivre')
        <div class="livres grille" id="livres">
            @foreach($livres as $livre)
                @include('fragments.lienLivre', ['livre'=>$livre])
            @endforeach
        </div>
    </div>
    @if($numeroPage < 1)
        @include('fragments.pagination', ['numeroPage'=>$numeroPage, 'urlPagination'=>$urlPagination, 'nombreTotalPages'=>$nombreTotalPages])

        <div class="ligne-h2">
            <h2 class="pale">Nouveautés</h2>
        </div>
        <div class="livres grille" id="livres">
        @foreach($livresNouveautes as $livreNouveaute)
                @include('fragments.lienLivre', ['livre'=>$livreNouveaute])
        @endforeach
    </div>
        <div class="background">
        <div class="ligne-h2">
            <h2 class="fonce">À venir</h2>
        </div>
        <div class="livres">
        @foreach($livresAVenirs as $livreAVenir)
                @include('fragments.lienLivre', ['livre'=>$livreAVenir])
            @endforeach
        </div>
        </div>
    @endif

    @include('fragments.pagination', ['numeroPage'=>$numeroPage, 'urlPagination'=>$urlPagination, 'nombreTotalPages'=>$nombreTotalPages])

@endsection