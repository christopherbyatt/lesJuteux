let btnPlus = document.getElementById("btnPlus");
let btnMoins = document.getElementById("btnMoins");
let input = document.getElementById("inputQteFicheLivre");
let inputPanier = document.getElementById('qtePanier');

btnPlus.addEventListener("click", function(){
    if(input !== null) {
        input.value++;
    }
    else {
        inputPanier.value++;
    }
})
btnMoins.addEventListener("click", function(){
    if(input !== null) {
        input.value--;
        if (input.value < 1){
            input.value = 1;
        }
    }
    else {
        inputPanier.value--;
        if(inputPanier < 0) {
            inputPanier.value = 0;
        }
    }
})