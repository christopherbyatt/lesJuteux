let btnPDF = document.getElementById("pdf");
let btnPapier = document.getElementById("papier");

btnPapier.addEventListener("click", function(){
    btnPapier.classList.add("format-selectionne");
    btnPDF.classList.remove("format-selectionne");
})

btnPDF.addEventListener("click", function(){
    btnPDF.classList.add("format-selectionne");
    btnPapier.classList.remove("format-selectionne");
})