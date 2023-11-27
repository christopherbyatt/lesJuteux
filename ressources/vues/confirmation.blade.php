@extends('gabarit', ['title', 'Confirmation de la commande'])

@section('contenu')
    <h3>Confirmation de la commande</h3>
    <div>
        <p>Votre numéro de commande est le H432KF992-001</p>
        <p>Bonjour {{$lePrenom}} {{$leNom}},</p>
        <p>Merci d’avoir magasiné chez La Pastèque Éditeur!</p>
        <p>Sachez que vous pouvez toujours commander nos livres chez votre libraire favori.</p>
        <p>La commande vous sera expédiée selon les modalités choisies. N’hésitez pas à consulter notre service à la clientèle pour plus d’informations relatives à votre commande ou votre compte.</p>
        <p>Vous recevrez une confirmation de votre commande par courriel.</p>
    </div>
    <div>
        <p>Votre date de livraison estimée est le mercredi 25 novembre 2022</p>
        <p>Mode livraison: régulière gratuite</p>
        <p>Votre commande sera expédié à {{$lePrenom}} {{$leNom}}</p>
        <p>{{$lAdresse}}</p>
        <p>{{$laVille}}</p>
        <p>{{$laProvince}}, {{$lePays}}</p>
        <p>{{$leCodePostal}}</p>
    </div>
    <button>Imprimer le reçu</button>
    <a href="index.php?controleur=site&action=accueil">Retourner à l'accueil</a>
@endsection