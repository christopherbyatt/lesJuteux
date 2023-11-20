<div class="livres__fiche mode-grille" id="livres__fiche">
    <a href="index.php?controleur=livre&action=fiche&idLivre={{$livre->getId()}}">
        @if ($livre->getDateQuebec() > date('Y-m-d', strtotime("-12 months")) && $livre->getDateQuebec() < date('Y-m-d', time()))
            <div class="livreNouveautesEtiquette"><span class="brilleEtiquette"></span>Nouveauté</div>
        @elseif($livre->getDateQuebec() > date('Y-m-d', time()))
            <div class="livreAVenirEtiquette"><span class="brilleEtiquette"></span>À venir</div>
        @else
            <div class="etiquetteVidePourReplirLEspace"></div>
        @endif
        @if(is_file("liaisons/images/livres/".$livre->getISBNPapier()."_w300.jpg"))
            <img src="liaisons/images/livres/{{$livre->getISBNPapier()}}_w300.jpg" class="imgLivre">
        @else
            <img src="liaisons/images/livres/noImage_w300.jpg" class="imgLivre">
        @endif
    </a>
    <div class="infosLivre" id="infosLivre">
        @foreach($livre->getAuteur() as $auteur)
            <p class="livres__auteurs">{{$auteur->getPrenomNom()}}</p>
        @endforeach
        <p class="livres__titre">{{$livre->getTitre()}}</p>
        <p class="livres__prix">{{$livre->getPrixCan()}}$</p>
    </div>
</div>