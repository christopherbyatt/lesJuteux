let btnPlus = document.getElementById("btnPlus");
let btnMoins = document.getElementById("btnMoins");
let input = document.getElementById("inputQteFicheLivre");

btnPlus.addEventListener("click", function(){
    input.value++;
})
btnMoins.addEventListener("click", function(){
    input.value--;

    if (input.value < 1){
        input.value = 1;
    }
})