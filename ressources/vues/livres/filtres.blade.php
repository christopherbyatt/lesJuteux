<div class="filtreEtTri">
    <h3 class="filtreEtTri__titre">Trier par:</h3>
    <ul class="listeTri">
        <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="livresAZ" name="choixTri" value="livresAZ"><label for="livresAZ">Nom de livre A-Z</label></li>
        <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="livresZA" name="choixTri" value="livresZA"><label for="livresZA">Nom de livre Z-A</label></li>
        <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="auteursAZ" name="choixTri" value="auteursAZ"><label for="auteursAZ">Nom d'auteur A-Z</label></li>
        <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="auteursZA" name="choixTri" value="auteursZA"><label for="auteursZA">Nom d'auteur Z_A</label></li>
        <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="prixASC" name="choixTri" value="prixASC"><label for="prixASC">Prix (Plus bas au plus élevé)</label></li>
        <li class="listeTri__choix"><input type="radio" class="listeTri__choix__radio" id="prixDESC" name="choixTri" value="prixDESC"><label for="prixDESC">Prix (Plus élevé au plus bas)</label></li>
{{--        <input type="radio" class="listeTri__choix__radio" id="prixDESC" name="prixDESC" value="prixDESC"><label for="prixDESC">Prix (Plus élevé au plus bas)</label>--}}
    </ul>
    <h3 class="filtreEtTri__titre">Filtrer par catégorie:</h3>
    <ul class="liste__filtre">
        <li><input type="checkbox" class="listeFiltre__choix__checkbox" id="categorie" name="choixFiltre" value="categorie"><label for="categorie">Catégories:</label></li>
    </ul>
    <button id="lancerRechercheLivres" class="filtreEtTri__bouttonRecherche">Relancer la recherche</button>
</div>