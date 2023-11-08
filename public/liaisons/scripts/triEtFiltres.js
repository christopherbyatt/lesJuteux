let btnEnvoie = document.getElementById("lancerRechercheLivres");
let arrFiltre = document.querySelectorAll(".listeTri__choix__radio");
let arrTri = document.querySelectorAll(".listeFiltre__choix__checkbox");
let arrVoirNos = document.querySelectorAll(".listeVoirNos__choix__radio");
let strTriCoche = "";
let arrFiltreEstCoche = [];
let strVoirNosCoche = "";
btnEnvoie.addEventListener("click", lancerRecherche);
function lancerRecherche(e) {
    arrFiltre.forEach(function (unFiltre) {
       if(unFiltre.checked === true) {
           strTriCoche = unFiltre.value;
       }
    });
    arrTri.forEach(function (unTri) {
        if(unTri.checked === true) {
           arrFiltreEstCoche.push(unTri.value);
       }
    });
    arrVoirNos.forEach(function (unVoirNos) {
        if(unVoirNos.checked === true) {
            strVoirNosCoche = unVoirNos.value;
        }
    });
    if(strTriCoche !== "aucun" || arrFiltreEstCoche.length !== 0 || strVoirNosCoche !== "livres") {
        console.log();
    }
    else{
        e.preventDefault();
    }
}