let btnPDF = document.getElementById("formatPdf");
let btnPapier = document.getElementById("formatPapier");

btnPapier.addEventListener("click", function(){
    btnPapier.classList.add("format-selectionne");
    btnPDF.classList.remove("format-selectionne");
})

btnPDF.addEventListener("click", function(){
    btnPDF.classList.add("format-selectionne");
    btnPapier.classList.remove("format-selectionne");
})