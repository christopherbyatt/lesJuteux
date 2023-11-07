<div class="nav">
    <div class="nav__largeur">
        <a href="index.php?controleur=site&action=accueil" class="nav__titre">La Pastèque</a>
        <div class="nav__recherche">
            <form class="nav__barreRecherche" action="index.php?controleur=site&action=accueil">
                <input type="text" name="recherche" class="nav__barre">
                <button class="nav__barreRecherche__btn"><span class="nav__barreRecherche__btn__icon"></span></button>
            </form>
        </div>
        <div class="nav__icon">
            <a href=""><span id="icon_position" class="icon"></span></a>
            <a href=""><span id="icon_favoris" class="icon"></span></a>
            <a href=""><span id="icon_compte" class="icon"></span></a>
            <a href=""><span id="icon_panier" class="icon"></span></a>
        </div>
    </div>
</div>
<div class="nav__menu">
    <button class="btnMenu nav__boutonMenu"><span class="nav__boutonMenu__icon" id="icon_menuFerme"></span></button>
    <div class="nav__largeur-menu">
        <ul class="nav__liste ferme">
            <li class="nav__item">
                <a href="index.php?controleur=nouveaute&action=index" class="nav__lien">Nouveautés</a>
            </li>
            <li class="nav__item">
                <a href="index.php?controleur=livre&action=index" class="nav__lien">Livres</a>
            </li>
            <li class="nav__item">
                <a href="index.php?controleur=auteur&action=index" class="nav__lien">Auteurs</a>
            </li>
            <li class="nav__item">
                <a href="index.php?controleur=site&action=boutique" class="nav__lien">Galerie/Boutique</a>
            </li>
            <li class="nav__item">
                <a href="index.php?controleur=site&action=apropos" class="nav__lien">À propos</a>
            </li>
            <li class="nav__item">
                <a href="index.php?controleur=site&action=production" class="nav__lien">Production La Pastèque</a>
            </li>
            <li class="nav__item">
                <a href="index.php?controleur=site&action=contact" class="nav__lien">Contact</a>
            </li>
        </ul>
    </div>
</div>