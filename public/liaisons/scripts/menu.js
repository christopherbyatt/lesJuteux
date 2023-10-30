document.querySelectorAll(".btnMenu").forEach(function(item) {
    item.addEventListener("click", function(item){
        toggleBouton(item);
    });
});

function toggleBouton(element) {
    if(element.target.getAttribute('id') === "icon_menuFerme"){
        console.log("J'étais fermé, je suis maintenant ouvert!");
        element.target.id = "icon_menuOuvert";
        document.querySelectorAll(".nav__liste").forEach(function (item) {
            item.classList.remove("ferme");
            item.classList.add("ouvert");
        });
        element.target.style.transition = "height 2s";
    }
    else if(element.target.getAttribute('id') === "icon_menuOuvert") {
        console.log("J'étais ouvert, je suis maintenant fermé!");
        element.target.id = "icon_menuFerme";
        document.querySelectorAll(".nav__liste").forEach(function (item) {
            item.classList.remove("ouvert");
            item.classList.add("ferme");
        });
    }
    else {
        console.log("oh oh, pas de classe ouvert ou fermé pour le bouton du menu");
    }
}