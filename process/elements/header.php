

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <title>l'aranzement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<header>
    <div id="logo" class="header-content">
        <img src="" alt="">
        <div>
            <h1>Laranzement.re</h1>
            <h2>L'annuaire des rhums arrangés</h2>
        </div>
    </div>

    <?php
    include "./elements/login.php";
    ?>

</header>
<menu>
    <div class="menu-item">Les recettes</div>
    <div class="menu-item">Les articles</div>
    <div class="menu-item">Le shop</div>
    <div class="menu-item"><input type="text" placeholder="Un ingrédient..." autocomplete="off"><button>Quelle recette ?</button></div>
</menu>

