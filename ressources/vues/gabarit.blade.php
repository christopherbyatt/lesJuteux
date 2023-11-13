<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="liaisons/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="liaisons/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="liaisons/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="liaisons/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="liaisons/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="liaisons/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script defer src="liaisons/scripts/menu.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <title>La Pastèque</title>
</head>
<body>
<header >
    @include('fragments.entete')
</header>

<main>
    @yield('contenu')
    <script src="liaisons/js/incrementationQte.js"></script>
    <script src="liaisons/js/affichageListeGrille.js"></script>
    <script src="liaisons/js/choisirFormatLivre.js"></script>
    <script src="liaisons/js/confirmationPanier.js"></script>
</main>

<footer>
    @include('fragments.pieddepage')
</footer>
</body>
</html>