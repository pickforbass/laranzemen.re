<?php
session_start();
include "connDB.php";
global $conn; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <script src="https://kit.fontawesome.com/1e527daaa5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/styles.css">
    <title>l'aranzemen</title>
</head>
<body class="page text-dark">
<header class="d-flex justify-content-between p-3">
    <div>
        <a href="index.php">
        <img src="" alt="">
        <div class="ml-3">
            <h1 class="mb-1">Laranzemen.re</h1>
            <h2>L'annuaire des rhums arrangés</h2>
        </div>
        </a>
    </div>

<?php include "login.php"; ?>

</header>
<nav>
<ul class="nav d-flex justify-content-end pr-3 bg-dark">
    <li class="nav-item nav-link align-middle">
        <a href="recipes.php">
        Les recettes
        </a>
    </li>
    <li class="nav-item nav-link align-middle">
        <a href="articles.php">
        Les articles
        </a>
    </li>
    <li class="align-middle">
        <input type="text" placeholder="Un ingrédient..." autocomplete="off" class="align-middle pl-1">
        <button class="btn btn-primary align-middle">Quelle recette ?</button>
    </li>
</ul>
</nav>

