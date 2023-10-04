<!DOCTTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="liaisons/css/styles.css">
    <title>La Pastèque</title>
</head>
<body>
<header >
    <h1>Mon site</h1>
    @include('fragments.entete')
</header>

<main>
    <h2>Contenu</h2>
    @yield('contenu')
</main>

<footer>
    @include('fragments.pieddepage')
</footer>
</body>
</html>