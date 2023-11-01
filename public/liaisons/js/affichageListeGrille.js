let btnListe = document.getElementById("btnListe");
let btnGrille = document.getElementById("btnGrille");
let livres = document.getElementById("livres");
btnListe.addEventListener("click", function(){
    btnListe.classList.add("selected");
    btnGrille.classList.remove("selected");

    livres.classList.add("liste");
    livres.classList.remove("grille");

    document.querySelector(".livres__fiche").classList.add("mode-liste");
    document.querySelector(".livres__fiche").classList.remove("mode-grille");

    console.log("En mode liste");
})
btnGrille.addEventListener("click", function(){
    btnGrille.classList.add("selected");
    btnListe.classList.remove("selected");

    livres.classList.add("grille");
    livres.classList.remove("liste");

    document.querySelector(".livres__fiche").classList.add("mode-grille");
    document.querySelector(".livres__fiche").classList.remove("mode-liste");

    console.log("En mode grille");
})