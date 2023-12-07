
@extends('gabarit', ['title'=>'Confirmation de la commande', 'description'=>'Votre commande est confirmée. Merci d\'avoir commandé chez La Pastèque!', 'keywords'=>['confirmation', 'paiement', 'commande', 'livres', 'librairie', 'sécurisé', 'québecois', 'La Pastèque']])

@section('contenu')
    <h1>Confirmation de la commande</h1>
    <div class="conteneurConfirm">
        <div class="conteneurConfirm__confirmation">
            <p class="conteneurConfirm__confirmation__texte">Votre numéro de commande est le H432KF992-001</p>
            <p class="conteneurConfirm__confirmation__texte">Bonjour {{$lePrenom}} {{$leNom}},</p>
            <p class="conteneurConfirm__confirmation__texte">Merci d’avoir magasiné chez La Pastèque Éditeur!</p>
            <p class="conteneurConfirm__confirmation__texte">Sachez que vous pouvez toujours commander nos livres chez votre libraire favori.</p>
            <p class="conteneurConfirm__confirmation__texte">La commande vous sera expédiée selon les modalités choisies. N’hésitez pas à consulter notre service à la clientèle pour plus d’informations relatives à votre commande ou votre compte.</p>
            <p class="conteneurConfirm__confirmation__texte">Vous recevrez une confirmation de votre commande par courriel.</p>
        </div>
        <div class="conteneurConfirm__infosConfirmation">
            <p class="conteneurConfirm__infosConfirmation__texte">Date de livraison estimée: Mercredi 25 novembre 2022</p>
            <p class="conteneurConfirm__infosConfirmation__texte">Mode livraison: régulière gratuite</p>
            <p class="conteneurConfirm__infosConfirmation__texte">Votre commande sera expédié à {{$lePrenom}} {{$leNom}}</p>
            <p class="conteneurConfirm__infosConfirmation__texte">{{$lAdresse}}</p>
            <p class="conteneurConfirm__infosConfirmation__texte">{{$laVille}}</p>
            <p class="conteneurConfirm__infosConfirmation__texte">{{$laProvince}}, {{$lePays}}</p>
            <p class="conteneurConfirm__infosConfirmation__texte">{{$leCodePostal}}</p>
        </div>
    </div>

    <div class="btnConfirmation">
        <button>Imprimer le reçu</button>
        <a href="index.php?controleur=site&action=accueil">Retourner à l'accueil</a>
    </div>
@endsection