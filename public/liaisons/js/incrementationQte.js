let btnPlus = document.getElementById("plus");
let btnMoins = document.getElementById("moins");
let input = document.getElementById("chiffre");

btnPlus.addEventListener("click", function(){
    input.value++;
})
btnMoins.addEventListener("click", function(){
    input.value--;

    if (input.value < 1){
        input.value = 1;
    }
})