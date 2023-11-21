<div class="filtreEtTri">
    <form action="index.php?controleur=livre&action=index&filtres=true" method="POST">
        <h3 class="filtreEtTri__titre">Filtrer par catégorie:</h3>
        <ul class="listeFiltre">
            @foreach($lesCategories as $uneCategorie)
                <li class="listeFiltre__choix"><label class="listeFiltre__choix__label" for="{{$uneCategorie->getId()}}">{{ucfirst($uneCategorie->getNom())}}<input type="checkbox" class="listeFiltre__choix__label__checkbox" id="{{$uneCategorie->getId()}}" name="choixCategorie[]" value="{{$uneCategorie->getId()}}"><span class="listeFiltre__choix__label__checkmark"></span></label></li>
            @endforeach
        </ul>
        <div class="lesbtns">
            <button id="lancerRechercheLivres" class="filtreEtTri__bouttonRecherche" type="submit">Relancer la recherche</button>
            <a id="reinitialiserRechercheLivres" class="filtreEtTri__bouttonReinitialiser" href="index.php?controleur=livre&action=index">Réinitialiser la recherche</a>
        </div>
    </form>
    <script src="liaisons/scripts/triEtFiltres.js"></script>
</div>