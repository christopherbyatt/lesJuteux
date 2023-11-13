let btnListe = document.getElementById("btnListe");
let btnGrille = document.getElementById("btnGrille");
let livres = document.querySelectorAll(".livres");
let auteurs = document.querySelectorAll(".auteurs");
btnListe.addEventListener("click", function(){
    btnListe.classList.add("selected");
    btnGrille.classList.remove("selected");

    // Page livres
    livres.forEach(function (item){
        item.classList.add("liste");
        item.classList.remove("grille");
    });

    document.querySelectorAll(".livres__fiche").forEach(function(item) {
        item.classList.add("mode-liste");
        item.classList.remove("mode-grille");
    });

    // Page auteurs
    auteurs.forEach(function (item){
        item.classList.add("liste");
        item.classList.remove("grille");
    });

    document.querySelectorAll(".auteurs__fiche").forEach(function(item) {
        item.classList.add("mode-liste");
        item.classList.remove("mode-grille");
    });

    console.log("En mode liste");
})
btnGrille.addEventListener("click", function(){
    btnGrille.classList.add("selected");
    btnListe.classList.remove("selected");

    // Page livres
    livres.forEach(function (item){
        item.classList.add("grille");
        item.classList.remove("liste");
    });

    document.querySelectorAll(".livres__fiche").forEach(function(item) {
        item.classList.add("mode-grille");
        item.classList.remove("mode-liste");
    });

    // Page auteurs
    auteurs.forEach(function (item){
        item.classList.add("grille");
        item.classList.remove("liste");
    });

    document.querySelectorAll(".auteurs__fiche").forEach(function(item) {
        item.classList.add("mode-grille");
        item.classList.remove("mode-liste");
    });

    console.log("En mode grille");
})