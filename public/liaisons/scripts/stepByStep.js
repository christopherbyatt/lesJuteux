document.getElementById('btnPartie01').addEventListener('click', function() { allerPage('2')});
document.getElementById('btnPartie02').addEventListener('click', function() { allerPage('3')});
document.getElementById('btnSubmit').addEventListener('click', envoyer);

let section01 = document.getElementById('paiementPartie1');
let section02 = document.getElementById('paiementPartie2');
let section03 = document.getElementById('paiementPartie3');

let btn01 = document.getElementById('btnAllerPartie01');
let btn02 = document.getElementById('btnAllerPartie02');
let btn03 = document.getElementById('btnAllerPartie03');

btn01.addEventListener('click', testSiActif);
btn02.addEventListener('click', testSiActif);
btn03.addEventListener('click', testSiActif);

function allerPage(unePage) {
    if(section01.classList.contains('visible')) {
        section01.classList.remove('visible');
        section01.classList.add('invisible');
        btn01.classList.remove('active')
    }
    else if(section02.classList.contains('visible')) {
        section02.classList.remove('visible');
        section02.classList.add('invisible');
        btn02.classList.remove('active')
    }
    else if(section03.classList.contains('visible')) {
        section03.classList.remove('visible');
        section03.classList.add('invisible');
        btn03.classList.remove('active')
    }

    switch (unePage) {
        case '1':
            section01.classList.remove('invisible');
            section01.classList.add('visible');
            btn01.classList.add('active');
            break;
        case '2':
            section02.classList.remove('invisible');
            section02.classList.add('visible');
            btn02.classList.add('active');
            break;
        case '3':
            section03.classList.remove('invisible');
            section03.classList.add('visible');
            btn03.classList.add('active');
            break;
    }

    retourEnHaut();
}
function testSiActif(e) {
    if(!e.target.classList.contains('active')) {
        if(e.target.value === '1' || e.target.classList.contains('1')) {
            allerPage('1');
        }
        else if(e.target.value === '2' || e.target.classList.contains('2')) {
            allerPage('2');
        }
        else if(e.target.value === '3' || e.target.classList.contains('3')) {
            allerPage('3');
        }
    }
}
function envoyer() {

}
function retourEnHaut() {
    document.getElementById("topOfTheWorld").scrollIntoView({behavior: 'smooth'});
}