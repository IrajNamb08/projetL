<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <li>
        <ul><a href="{{ route('ajout.categorie') }}">Catégories</a></ul>
        <ul><a href="{{ route('ajout.marque') }}">Marques</a></ul>
        <ul><a href="{{ route('ajout.couleur') }}">Couleurs</a></ul>
        <ul><a href="{{ route ('ajout.produit')}}">Produits</a></ul>
        <ul><a href="{{ route ('ajout.commande')}}">Commande</a></ul>
        <ul><a href="{{ route ('inscription.utilisateur')}}">Inscription</a></ul>
        <ul><a href="{{ route ('liste.utilisateur')}}">liste utilisateur</a></ul>
    </li>
</body>
</html>