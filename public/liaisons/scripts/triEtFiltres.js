let btnEnvoie = document.getElementById("lancerRechercheLivres");
let arrFiltre = document.querySelectorAll(".listeTri__choix__radio");
let arrTri = document.querySelectorAll(".listeFiltre__listeCategorie__choix__checkbox");
let arrFiltreEstCoche = [];
let arrTriEstCoche = [];
btnEnvoie.addEventListener("click", lancerRecherche);
window.addEventListener("load", function () {
    console.log(window.location.search);
});

function lancerRecherche(e) {
    arrFiltre.forEach(function (unFiltre) {
       if(unFiltre.checked === true) {
           arrFiltreEstCoche.push(unFiltre.value);
       }
    });
    arrTri.forEach(function (unTri) {
       if(unTri.checked === true) {
           arrTriEstCoche.push(unTri.value);
       }
    });
    if(arrTriEstCoche !== [] || arrFiltreEstCoche !== []) {
        console.log(arrTriEstCoche);
        console.log(arrFiltreEstCoche);
    }
    else{
        e.preventDefault();
    }
}