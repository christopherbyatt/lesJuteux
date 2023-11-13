let btnAjouter = document.getElementById("btnAjouter");
let message = document.getElementById("pConfirmation");
let quantite = document.getElementById("chiffre");

let papier = document.getElementById("papier");
let pdf = document.getElementById("pdf");

btnAjouter.addEventListener("click", function(){
    message.innerHTML = "Vous venez d'ajouter " + quantite.value + " livre(s)";

    if(papier.classList.contains("format-selectionne")){
        message.innerHTML += " en format papier"
    } else if(pdf.classList.contains("format-selectionne")){
        message.innerHTML += " en format PDF"
    }

    message.innerHTML += " au panier!";
});