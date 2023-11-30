@extends('gabarit', ['title'=>'Paiement'])

@section('contenu')
    <span aria-hidden="true" id="topOfTheWorld"></span>
    <div class="divStepByStep">
        <button class="divStepByStep__btn active" id="btnAllerPartie01" value="1"><span class="1">1.Livraison</span></button>
        <button class="divStepByStep__btn" id="btnAllerPartie02" value="2"><span class="2">2.Facturation</span></button>
        <button class="divStepByStep__btn" id="btnAllerPartie03" value="3"><span class="3">3.Validation</span></button>
    </div>
    <form class="" action="index.php?controleur=site&action=confirmation" method="POST">
        <div class="sectionPaiement visible" id="paiementPartie1">
            <h1>1. Livraison</h1>
            <div class="sectionPaiement__section" id="identification">
                <div class="ligne-h2">
                    <h2 class="pale">Identification</h2>
                </div>
                <label for="courriel">Adresse courriel:</label>
                <input type="text" id="courriel" name="courriel" class="sectionPaiement__section__input large">
                <div id="divNomPrenom">
                    <div>
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom" class="sectionPaiement__section__input medium">
                    </div>
                    <div>
                        <label for="nom">Nom de famille:</label>
                        <input type="text" id="nom" name="nom" class="sectionPaiement__section__input medium">
                    </div>
                </div>
                <p>Ces informations seront utilisées uniquement pour confirmer votre commande ou vous joindre en cas de besoin pour le suivi de votre commande.</p>
            </div>
            <div class="background">
                <div class="sectionPaiement__section" id="adresseLivraison">
                    <div class="ligne-h2">
                        <h2 class="fonce">Adresse de livraison</h2>
                    </div>
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" class="sectionPaiement__section__input large">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville" class="sectionPaiement__section__input medium">
                    <div id="divProvincePays">
                        <div>
                            <label for="province">Province ou territoire:</label>
                            <select id="province" name="province" class="sectionPaiement__section__select medium">
                                <option value="0" selected>Choississez un province ou un territoire</option>
                                <option value="AB">Alberta</option>
                                <option value="BC">Colombie-Britannique</option>
                                <option value="PE">Île-du-Prince-Édouard</option>
                                <option value="MB">Manitoba</option>
                                <option value="NB">Nouveau-Brunswick</option>
                                <option value="NS">Nouvelle-Écosse</option>
                                <option value="ON">Ontario</option>
                                <option value="QC">Québec</option>
                                <option value="SK">Saskatchewan</option>
                                <option value="NL">Terre-Neuve-et-Labrador</option>
                                <option value="NT">Territoire du Nord-Ouest</option>
                                <option value="NU">Nunavut</option>
                                <option value="YT">Yukon</option>
                            </select>
                        </div>
                        <div>
                            <label for="pays">Pays:</label>
                            <select id="pays" name="pays" class="sectionPaiement__section__select medium">
                                <option value="0" selected>Choississez un pays:</option>
                                <option value="Canada">Canada</option>
                            </select>
                        </div>
                    </div>
                    <label for="codePostal"> Code Postal: (Ex: A1A 1A1)</label>
                    <input type="text" id="codePostal" name="codePostal" class="sectionPaiement__section__input small">
                    <label for="memeAdresse" class="sectionPaiement__section__label">Utiliser comme adresse de facturation<input type="checkbox" id="memeAdresse" name="memeAdresse" class="sectionPaiement__section__label__checkbox"><span class="sectionPaiement__section__label__checkmark"></span></label>
                </div>
            </div>
            <button type="button" id="btnPartie01">Continuer</button>
        </div>
        <div class="sectionPaiement invisible" id="paiementPartie2">
            <h1>2. Facturation</h1>
            <div class="sectionPaiement__section" id="rappelIdentification01">
                <div class="ligne-h2">
                    <h2 class="pale">Identification</h2>
                </div>
                <p>uneAdresseCourriel@unDomaine.ca</p>
                <p>Prénom Nom</p>
            </div>
            <div class="background">
                <div id="infoPaiement">
                    <div class="ligne-h2">
                        <h2 class="fonce">Informations de paiement</h2>
                    </div>
                    <div class="sectionPaiement__section" id="adresseDeFacturation">
                        <h3>Adresse de Facturation</h3>
                        @if(true)
                            <label for="adresseFacturation">Adresse:</label>
                            <input type="text" id="adresseFacturation" name="adresseFacturation" class="sectionPaiement__section__input large">
                            <label for="villeFacturation">Ville</label>
                            <input type="text" id="villeFacturation" name="villeFacturation" class="sectionPaiement__section__input medium">
                            <div id="divProvincePaysFacturation">
                                <div>
                                    <label for="provinceFacturation">Province ou territoire:</label>
                                    <select id="provinceFacturation" name="provinceFacturation" class="sectionPaiement__section__select medium">
                                        <option value="0" selected>Choississez un province ou un territoire</option>
                                        <option value="AB">Alberta</option>
                                        <option value="BC">Colombie-Britannique</option>
                                        <option value="PE">Île-du-Prince-Édouard</option>
                                        <option value="MB">Manitoba</option>
                                        <option value="NB">Nouveau-Brunswick</option>
                                        <option value="NS">Nouvelle-Écosse</option>
                                        <option value="ON">Ontario</option>
                                        <option value="QC">Québec</option>
                                        <option value="SK">Saskatchewan</option>
                                        <option value="NL">Terre-Neuve-et-Labrador</option>
                                        <option value="NT">Territoire du Nord-Ouest</option>
                                        <option value="NU">Nunavut</option>
                                        <option value="YT">Yukon</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="paysFacturation">Pays:</label>
                                    <select id="paysFacturation" name="paysFacturation" class="sectionPaiement__section__select medium">
                                        <option value="0" selected>Choississez un pays:</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                </div>
                            </div>
                            <label for="codePostalFacturation"> Code Postal: (Ex: A1A 1A1)</label>
                            <input type="text" id="codePostalFacturation" name="codePostalFacturation" class="sectionPaiement__section__input small">
                        @else
                            <a href="">Modifier</a>
                            <p>1234 une rue, no app</p>
                            <p>Une ville</p>
                            <p>Une province, un pays</p>
                            <p>Un code postal</p>
                        @endif
                    </div>
                    <div class="sectionPaiement__section" id="modePaiement">
                        <h3>Mode de paiement</h3>
                        <h4>Cartes de crédit acceptées</h4>
                        <ul class="sectionPaiement__section__liste">
                            <li class="sectionPaiement__section__liste__item">
                                <label for="carteCreditVisa" class="sectionPaiement__section__liste__item__label">
                                    Visa<span class="sectionPaiement__section__liste__item__label__span"></span>
                                </label>
                                <input type="radio" id="carteCreditVisa" name="carteCredit" value="visa">
                            </li>
                            <li class="sectionPaiement__section__liste__item">
                                <label for="carteCreditmc" class="sectionPaiement__section__liste__item__label">
                                    MasterCard<span class="sectionPaiement__section__liste__item__label__span"></span>
                                </label>
                                <input type="radio" id="carteCreditmc" name="carteCredit" value="mc">
                            </li>
                            <li class="sectionPaiement__section__liste__item">
                                <label for="carteCreditAmex" class="sectionPaiement__section__liste__item__label">
                                    American Express<span class="sectionPaiement__section__liste__item__label__span"></span>
                                </label>
                                <input type="radio" id="carteCreditAmex" name="carteCredit" value="amex">
                            </li>
                        </ul>
                        <label for="titulaire">Nom du tituaire:</label>
                        <input type="text" id="titulaire" name="titulaire" class="sectionPaiement__section__input large">
                        <label for="noCarte">Numéro de carte</label>
                        <input type="number" id="noCarte" name="noCarte" class="sectionPaiement__section__input large">
                        <span id="infoNoCarte"></span>
                        <label for="cvc">Code de sécurité</label>
                        <input type="number" id="cvc" name="cvc" class="sectionPaiement__section__input xSmall">
                        <span id="infoNoSecu"></span>
                        <fieldset id="fieldsetExpi">
                            <legend>Date d'expiration: </legend>
                            <div>
                                <label for="moisExpi">Mois (MM)</label>
                                <select id="moisExpi" name="moisExpi" class="sectionPaiement__section__select xSmall">
                                    <option value="0" selected>MM</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div>
                                <label for="anneeExpi">Année (AA)</label>
                                <select id="anneeExpi" name="anneeExpi" class="sectionPaiement__section__select xSmall">
                                    <option value="0" selected>AA</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <button type="button" id="btnPartie02">Continuer</button>
        </div>
        <div class="sectionPaiement invisible" id="paiementPartie3">
            <h1>3. Validation</h1>
            <p>Livraison à Prénom Nom</p>
            <div class="background">
                <div class="sectionPaiement__section" id="confirmationAdresse">
                    <div class="ligne-h2">
                        <h2 class="fonce">Adresse de livraison</h2>
                    </div>
                    <a href="">Modifier</a>
                    <p>1234 une rue, no app</p>
                    <p>Une ville</p>
                    <p>Une province, un pays</p>
                    <p>Un code postal</p>
                    <div class="sectionPaiement__section__dateLivraison">
                        <p>Date de livraison estimée:</p>
                        <p>24 décembre 2023</p>
                    </div>
                </div>
            </div>
            <div class="sectionPaiement__section" id="recapulatifCommande">
                <div class="ligne-h2">
                    <h2 class="pale">Récapulatif de la commande</h2>
                </div>
                <div class="sectionPaiement__section__sousSection" id="sousTotalArticle">
                    <p>Un nombre d'articles</p>
                    <p>80,99$</p>
                </div>
                <div class="sectionPaiement__section__sousSection" id="livraison">
                    <p>Livraison standard</p>
                    <p>0,00$</p>
                </div>
                <div class="sectionPaiement__section__sousSection" id="sousTotalArticleLivraison">
                    <p>Sous-total</p>
                    <p>80,99$</p>
                </div>
                <div class="sectionPaiement__section__sousSection" id="TPS">
                    <p>TPS (5%)</p>
                    <p>4,04$</p>
                </div>
                <div class="sectionPaiement__section__sousSection" id="total">
                    <p>Total</p>
                    <p>85,04$</p>
                </div>
            </div>
            <div class="background">
                <div class="sectionPaiement__section" id="confirmationInfoPaiement">
                    <div class="ligne-h2">
                        <h2 class="fonce">Informations de paiement</h2>
                    </div>
                    <a href="">Modifier</a>
                    <h5>Adresse de facturation:</h5>
                    <p>1234 une rue, no app</p>
                    <p>Une ville</p>
                    <p>Une province, un pays</p>
                    <p>Un code postal</p>
                    <h5>Mode de paiement:</h5>
                    <span id="iconCarteChoisie"></span>
                    <p>XXXX XXXX XXXX 1234</p>
                </div>
            </div>
            <button type="submit" id="btnSubmit">Passer la commande</button>
        </div>
    </form>
    <script src="liaisons/scripts/stepByStep.js"></script>
@endsection