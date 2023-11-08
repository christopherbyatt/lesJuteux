<div class="filtreEtTri">
    <form action="index.php?controleur=livre&action=index&filtres=true" method="POST">
        <h3 class="filtreEtTri__titre">Trier par:</h3>
        <ul class="listeTri">
            <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="aucun" name="choixTri" value="aucun" checked><label for="aucun">Aucun tri</label></li>
            <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="livresAZ" name="choixTri" value="livresAZ"><label for="livresAZ">Nom de livre A-Z</label></li>
            <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="livresZA" name="choixTri" value="livresZA"><label for="livresZA">Nom de livre Z-A</label></li>
            <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="auteursAZ" name="choixTri" value="auteursAZ"><label for="auteursAZ">Nom d'auteur A-Z</label></li>
            <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="auteursZA" name="choixTri" value="auteursZA"><label for="auteursZA">Nom d'auteur Z-A</label></li>
            <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="prixASC" name="choixTri" value="prixASC"><label for="prixASC">Prix (Plus bas au plus élevé)</label></li>
            <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="prixDESC" name="choixTri" value="prixDESC"><label for="prixDESC">Prix (Plus élevé au plus bas)</label></li>
        </ul>
        <h3 class="filtreEtTri__titre">Filtrer par catégorie:</h3>
        <ul class="listeFiltre">
            @foreach($lesCategories as $uneCategorie)
                <li class="listeFiltre__choix"><input type="checkbox" class="listeFiltre__choix__checkbox" id="{{$uneCategorie->getId()}}" name="choixCategorie" value="{{$uneCategorie->getId()}}"><label for="{{$uneCategorie->getId()}}">{{ucfirst($uneCategorie->getNom())}}</label></li>
            @endforeach
        </ul>
        <h3 class="filtreEtTri__titre">Voir nos:</h3>
        <ul class="listeVoirNos">
            <li class="listeVoirNos__choix"><input type="radio" class="listeVoirNos__choix__radio" id="livres" name="choixVoirNos" value="livres" checked><label for="livres">Livres</label></li>
            <li class="listeVoirNos__choix"><input type="radio" class="listeVoirNos__choix__radio" id="nouveautes" name="choixVoirNos" value="nouveautes"><label for="nouveautes">Nouveautés</label></li>
            <li class="listeVoirNos__choix"><input type="radio" class="listeVoirNos__choix__radio" id="livresAVenir" name="choixVoirNos" value="livresAVenir"><label for="livresAVenir">Livres à venir</label></li>
        </ul>
        <button id="lancerRechercheLivres" class="filtreEtTri__bouttonRecherche" type="submit">Relancer la recherche</button>
        <a id="reinitialiserRechercheLivres" class="filtreEtTri__bouttonReinitialiser" href="index.php?controleur=livre&action=index">Réinitialiser la recherche</a>
</form>
    <script src="liaisons/scripts/triEtFiltres.js"></script>
</div>