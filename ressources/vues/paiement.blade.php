@extends('gabarit', ['title'=>'Paiement'])

@section('contenu')
    <form class="">
        <div class="sectionPaiement partie01">
            <h3>Livraison</h3>
            <div class="sectionPaiement__section" id="identification">
                <h4>Identification</h4>
                <label for="courriel">Adresse courriel:</label>
                <input type="text" id="courriel" name="courriel">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom">
                <label for="nom">Nom de famille:</label>
                <input type="text" id="nom" name="nom">
                <p>Ces informations seront utilisées uniquement pour confirmer votre commande ou vous joindre en cas de besoin pour le suivi de votre commande.</p>
            </div>
            <div class="sectionPaiement__section" id="adresseLivraison">
                <h4>Adresse de livraison</h4>
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville">
                <label for="province">Province ou territoire:</label>
                <select id="province" name="province">
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
                <label for="pays">Pays:</label>
                <select id="pays" name="pays">
                    <option value="0" selected>Choississez un pays:</option>
                    <option value="1">Canada</option>
                </select>
                <div class="avertissementPays">
                    <p>Notre système ne nous permet actuellement que de livrer au Canada.</p>
                    <p>Désolé de l'inconvénient.</p>
                </div>
                <label for="codePostal"> Code Postal: (Ex: A1A 1A1)</label>
                <input type="number" id="codePostal" name="codePostal">
                <label for="memeAdresse" class="sectionPaiement__section__label">Utiliser comme adresse de facturation<input type="checkbox" id="memeAdresse" name="memeAdresse" class="sectionPaiement__section__label__checkbox"><span class="sectionPaiement__section__label__checkmark"></span></label>
            </div>
            <button type="button" id="btnPartie01">Continuer</button>
        </div>
        <div class="sectionPaiement partie02">
            <h3>Facturation</h3>
            <div class="sectionPaiement__section" id="rappelIdentification01">
                <h4>Identification</h4>
                <p>uneAdresseCourriel@unDomaine.ca</p>
                <p>Prénom Nom</p>
            </div>
            <h4>Informations de paiement</h4>
            <div class="sectionPaiement__section" id="adresseDeFacturation">
                <h5>Adresse de Facturation</h5>
                @if(true)
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville">
                    <label for="province">Province ou territoire:</label>
                    <select id="province" name="province">
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
                    <label for="pays">Pays:</label>
                    <select id="pays" name="pays">
                        <option value="0" selected>Choississez un pays:</option>
                        <option value="1">Canada</option>
                    </select>
                    <div class="sectionPaiement__section__avertissementPays">
                        <p>Notre système ne nous permet actuellement que de livrer au Canada.</p>
                        <p>Désolé de l'inconvénient.</p>
                    </div>
                    <label for="codePostal"> Code Postal: (Ex: A1A 1A1)</label>
                    <input type="number" id="codePostal" name="codePostal">
                @else
                    <a href="">Modifier</a>
                    <p>1234 une rue, no app</p>
                    <p>Une ville</p>
                    <p>Une province, un pays</p>
                    <p>Un code postal</p>
                @endif
            </div>
            <div class="sectionPaiement__section" id="modePaiement">
                <h5>Mode de paiement</h5>
                <h6>Cartes de crédit acceptées</h6>
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
                <input type="text" id="titulaire" name="titulaire">
                <label for="noCarte">Numéro de carte</label>
                <input type="number" id="noCarte" name="noCarte">
                <span id="infoNoCarte"></span>
                <fieldset>
                    <legend>Date d'expiration: </legend>
                    <label for="moisExpi">Mois (MM)</label>
                    <select id="moisExpi" name="moisExpi">
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
                    <label for="anneeExpi">Année (AA)</label>
                    <select id="anneeExpi" name="anneeExpi">
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
                </fieldset>
                <label for="cvc">Code de sécurité</label>
                <input type="number" id="cvc" name="cvc">
                <span id="infoNoSecu"></span>
            </div>
            <button type="button" id="btnPartie02">Continuer</button>
        </div>
        <div class="sectionPaiement partie03">
            <h3>Validation</h3>
            <p>Livraison à Prénom Nom</p>
            <div class="sectionPaiement__section" id="confirmationAdresse">
                <h4>Adresse de livraison</h4>
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
            <div class="sectionPaiement__section" id="recapulatifCommande">
                <h4>Récapulatif de la commande</h4>
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
            <div class="sectionPaiement__section" id="confirmationInfoPaiement">
                <h4>Informations de paiement</h4>
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
            <button type="submit">Passer la commande</button>
        </div>
    </form>
@endsection