let btnEnvoie = document.getElementById("lancerRechercheLivres");
let arrFiltre = document.querySelectorAll(".listeFiltre__choix__checkbox");
let arrFiltreEstCoche = [];
btnEnvoie.addEventListener("click", lancerRecherche);
function lancerRecherche(e) {
    arrFiltre.forEach(function (unTri) {
        if(unTri.checked === true) {
           arrFiltreEstCoche.push(unTri.value);
       }
    });
    if(arrFiltreEstCoche.length !== 0) {
        // console.log('allo');
    }
    else{
        // console.log('ohoh')
        e.preventDefault();
    }
}