let btnListe = document.getElementById("btnListe");
let btnGrille = document.getElementById("btnGrille");
let livres = document.getElementById("livres");
btnListe.addEventListener("click", function(){
    livres.classList.add("liste");
    livres.classList.remove("grille");

    console.log("En mode liste");
})
btnGrille.addEventListener("click", function(){
    livres.classList.add("grille");
    livres.classList.remove("liste");

    console.log("En mode grille");
})