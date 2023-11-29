// let message = document.getElementById("pConfirmation");
let quantite = document.getElementById("chiffre");

let papier = document.getElementById("papier");
let pdf = document.getElementById("pdf");

// Code du modal (https://www.w3schools.com/howto/howto_css_modals.asp) mélangé avec mon code personnel (Rosalie)

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("btnAjouter");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// Créer des éléments (https://developer.mozilla.org/en-US/docs/Web/API/Document/createElement)
const newP = document.createElement("p");
newP.classList.add('modal-texte');
const modalBody = document.getElementById("modal-body");

modalBody.appendChild(newP);

// const newLink = document.createElement("a");
// newLink.classList.add('modal-lien');
// modalBody.appendChild(newLink);

// When the user clicks on the button, open the modal
btn.onclick = function() {

    newP.innerHTML = "";
    let message = "";

    if (quantite.value == 1){
        message = "Vous venez d'ajouter " + quantite.value + " livre";
    } else if (quantite.value > 1) {
        message = "Vous venez d'ajouter " + quantite.value + " livres";
    }

    if(papier.classList.contains("format-selectionne")){
        message += " en format papier";
    } else if(pdf.classList.contains("format-selectionne")){
        message += " en format PDF";
    }

    message += " au panier!";

    if (quantite.value <= 0){
        message = "Veuillez entrer une quantité valide...";
    }

    modal.style.display = "block";

    console.log(newP);
    newP.innerHTML = message;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}