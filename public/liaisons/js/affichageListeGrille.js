let btnListe = document.getElementById("btnListe");
let btnGrille = document.getElementById("btnGrille");
let livres = document.querySelectorAll(".livres");
btnListe.addEventListener("click", function(){
    btnListe.classList.add("selected");
    btnGrille.classList.remove("selected");

    livres.forEach(function (item){
        item.classList.add("liste");
        item.classList.remove("grille");
    });
    // livres.classList.add("liste");
    // livres.classList.remove("grille");

    document.querySelectorAll(".livres__fiche").forEach(function(item) {
        item.classList.add("mode-liste");
        item.classList.remove("mode-grille");
    });

    console.log("En mode liste");
})
btnGrille.addEventListener("click", function(){
    btnGrille.classList.add("selected");
    btnListe.classList.remove("selected");

    livres.forEach(function (item){
        item.classList.add("grille");
        item.classList.remove("liste");
    });
    // livres.classList.add("grille");
    // livres.classList.remove("liste");

    document.querySelectorAll(".livres__fiche").forEach(function(item) {
        item.classList.add("mode-grille");
        item.classList.remove("mode-liste");
    });

    console.log("En mode grille");
})