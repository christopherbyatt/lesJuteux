let btnAjouter = document.getElementById("btnAjouter");
let message = document.getElementById("pConfirmation");
let quantite = document.getElementById("chiffre");

btnAjouter.addEventListener("click", function(){
    message.innerHTML = "Vous venez d'ajouter " + quantite.value + " livre(s) au panier!";
});