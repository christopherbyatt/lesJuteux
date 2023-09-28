var validation = {
    //conserve la référence de l'élément de formulaire
    refFormulaire:null,
    //conserse le tableau des messages d'erreur
    tErreurs:[],
    //tableau des validités des champs
    tValide:[],

    /**
     * Méthode d'initialisation de la validation du formulaire
     */
    initialiser: function(){

        //si le javascript et activé, la classe js est placée dans le body indiquant au CSS qu'il est actif
        document.body.className = "js";

        //obtient la référence de la balise <form> en utilisant la classe formulaire
        this.refFormulaire = document.querySelector(".formulaire");

        //empêche la validation html quand il y a du javascript
        this.refFormulaire.setAttribute('novalidate', 'novalidate');

        //défini les écouteurs d'événement des boutons submit et reset
        this.refFormulaire.addEventListener('submit', this.validerFormulaire.bind(this));
        this.refFormulaire.addEventListener('reset', this.effacerFormulaire.bind(this));

        //défini les écouteurs blur des éléments de texte du formulaire
        this.refFormulaire.querySelector("#prenom").addEventListener("blur", this.validerChampTexte.bind(this));
        this.refFormulaire.querySelector("#nom").addEventListener("blur", this.validerChampTexte.bind(this));
        this.refFormulaire.querySelector("#courriel").addEventListener("blur", this.validerChampTexte.bind(this));
        this.refFormulaire.querySelector("#telephone").addEventListener("blur", this.validerChampTexte.bind(this));
        this.refFormulaire.querySelector("#adresse").addEventListener("blur", this.validerChampTexte.bind(this));
        this.refFormulaire.querySelector("#ville").addEventListener("blur", this.validerChampTexte.bind(this));
        this.refFormulaire.querySelector("#codePostal").addEventListener("blur", this.validerChampTexte.bind(this));

        this.tValide["prenom"]=false;
        this.tValide["nom"]=false;
        this.tValide["courriel"]=false;
        this.tValide["telephone"]=false;
        this.tValide["adresse"]=false;
        this.tValide["ville"]=false;
        this.tValide["codePostal"]=false;

        console.log("init "+ this.tErreurs);

    },

    chargeJSON: function(objJSON){
        //fonction fetch (chargement asynchrone du JSON)
        fetch(objJSON)
            .then(response => response.json()) //la prommesse retourne une réponse de type JSON
            .then(monJSON => this.tErreurs=monJSON); // une fois reçu, on stock le JSON dans la variable
    },

    /**
     * Méthode de validation des champs de texte
     * @param evenement
     */
    validerChampTexte: function(evenement){
        console.log("validerChampTexte "+  this.tErreurs);
        //champ invalide par défaut
        var valide=false;
        //objet du DOM déclancheur, initialise un objet jQuery
        var objCible=evenement.currentTarget;
        //retrouve le regexp de l'objet du DOM en lisant l'attribut pattern
        var strChaineExp=new RegExp(objCible.getAttribute('pattern'));
        //valide si pas vide
        if(this.validerSiVide(objCible)===true){
            //si vide, afficher le message d'erreur
            this.afficherChampErreur(objCible, this.tErreurs[objCible.getAttribute("name")]["vide"]);
        }else{
            if(objCible.hasAttribute("pattern")){
                //si pas vide, tester le pattern
                if (strChaineExp.test(objCible.value)) {
                    //si pattern ok
                    valide = true;
                    //effacer le champ d'erreur
                    this.effacerChampErreur(objCible);
                } else {
                    //si pattern invalide afficher message détaillé
                    this.afficherChampErreur(objCible, this.tErreurs[objCible.getAttribute("name")]["pattern"]);
                }
            }else{
                this.effacerChampErreur(objCible);
                valide = true;
            }
        }
        //modifier le tableau des validitées
        this.modifierTableauValidation(objCible.getAttribute("name"),valide);
    },

    /**
     * Méthode de validation finale du formulaire et d'envoi
     * @param evenement
     */
    validerFormulaire: function(evenement){
        //Par defaut, le formulaire est considé comme valide
        var valide = true;
        //Pour chacun des champs présent dans le tableau de validation
        for(var champ in this.tValide ){
            //Si un champ est invalide
            if (this.tValide[champ] === false) {
                //cible l'objet du DOM fautif
                var objCible=this.refFormulaire.querySelector("#"+champ);
                //ici deux possibilité de message, vide ou pattern
                if(this.validerSiVide(objCible)===true){
                    this.afficherChampErreur(objCible, this.tErreurs[objCible.getAttribute("name")]["vide"]);
                }else{
                    if(objCible.hasAttribute("pattern")){
                        var strChaineExp=new RegExp(objCible.getAttribute('pattern'));
                        if(strChaineExp.test(objCible.value) ){
                            //affiche que l'entrée n'est pas du bon format
                            this.afficherChampErreur(objCible, this.tErreurs[objCible.getAttribute("name")]["pattern"]);
                        }
                    } else {
                        //effacer le champ d'erreur
                        this.effacerChampErreur(objCible);
                    }
                }
                //Le formulaire contient des champs invalide, et n'est donc pas prêt à l'envoi
                valide=false;
            }
        }

        // si le formulaire n'est pas valide, on annule la soumission du formulaire de l'événement submit
        if(valide === false){
            evenement.preventDefault();
        }
    },


    //Méthodes utilitaires**********************************
    /**
     * Méthode de validation de champs si vide
     * @param objCible
     * @returns {boolean}
     */
    validerSiVide: function(objCible){
        var valide = false; //false = champ vide
        if(objCible.value === ""){
            valide = true; //si false, champ contient quelque chose
        }
        return valide;
    },

    /**
     * Méthode d'affichage des messages d'erreur
     * @param objCible
     * @param message
     */
    afficherChampErreur: function (objCible,message){
        var nom = "err_"+objCible.getAttribute("id");
        document.getElementById(nom).innerHTML=message;
        objCible.parentNode.classList.add("formulaire__item--erreur");
    },

    /**
     * Méthode d'effacement des messages d'erreur
     * @param objCible
     */
    effacerChampErreur: function(objCible) {
        var nom = "err_"+objCible.getAttribute("id");
        document.getElementById(nom).innerHTML="";
        objCible.parentNode.classList.remove("formulaire__item--erreur");
    },

    /**
     * Méthode de d'inscription de l'état des champs dans le tableau de validation
     * @param nomChamp
     * @param valide
     */
    modifierTableauValidation:function(nomChamp,valide){
        this.tValide[nomChamp]=valide;
    },

    /**
     * Méthode d'effacement des message d'erreur et de remise à zéro des champs du formulaire
     */
    effacerFormulaire: function(){
        var liste=document.querySelectorAll(".formulaire__erreur")
        liste.forEach(function(objetCible){
            objetCible.innerHTML="";
            objetCible.parentNode.classList.remove("formulaire__item--erreur");
        });
        this.tValide["prenom"]=false;
        this.tValide["nom"]=false;
        this.tValide["courriel"]=false;
        this.tValide["sujet"]=false;
        this.tValide["message"]=false;
    }
};
//Fin méthodes utilitaires**********************************

//*******************
// Écouteurs d'événements
//*******************
window.addEventListener('load', validation.initialiser.bind(validation));

const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");
let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum++;
        updateFormSteps();
        updateProgressbar();
    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum--;
        updateFormSteps();
        updateProgressbar();
    });
});

function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("form-step-active") &&
        formStep.classList.remove("form-step-active");
    });

    formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-active");
        } else {
            progressStep.classList.remove("progress-step-active");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active");

    progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
