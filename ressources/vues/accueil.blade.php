
@extends('gabarit', ['title'=>'Accueil', 'description'=>'Visitez le site de La Pastèque, une maison d\'édition fondée en 1998 spécialisée en bandes dessinée, et en livre jeunesse. Magasinez, découvrez ou explorez notre vaste sélection de livres.', 'keywords'=>['bd', 'livres', 'librairie', 'accueil', 'auteurs', 'maison d\'édition', 'québecois', 'La Pastèque']])

@section('contenu')
    <h1>Accueil</h1>
    <div class="background">
        <div class="ligne-h2">
            <h2 class="fonce">Nouveautés</h2>
        </div>
        <div class="livres">
            @foreach($livresNouveautes as $livreNouveaute)
                @include('fragments.lienLivre', ['livre'=>$livreNouveaute])
            @endforeach
        </div>
    </div>
    <div class="ligne-h2">
        <h2 class="pale">À venir</h2>
    </div>
    <div class="livres">
        @foreach($livresAVenirs as $livreAVenir)
            @include('fragments.lienLivre', ['livre'=>$livreAVenir])
        @endforeach
    </div>
    <div>
        <div class="background">
            <div class="ligne-h2">
                <h2 class="fonce">Actualités</h2>
            </div>
            <div class="actualite">
                <div class="actualite__largeur">
                    <div class="actualite__info">
                        @foreach($actualites as $actualite)
                            <h3>{{$actualite->getTitre()}}</h3>
                                <small>{{$actualite->getDate()}}</small>
                            <p>{{$actualite->getLActualite()}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    <div class="ligne-h2">
        <h2 class="pale">Événements</h2>
    </div>
    <div class="evenement">
        <div class="evenement__largeur">
            <div class="evenement__info">
                @foreach($evenenents as $evenement)
                    <h3>{{$evenement->getTitre()}}</h3>
                    <small>{{$evenement->getDate()}}</small>
                    <p>{{$evenement->getLEvenement()}}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection