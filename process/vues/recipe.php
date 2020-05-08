<?php

require "../parts/header.php";
global $conn;

$id_recipe = $_GET['id'];
$selectrecipe = "SELECT  a.*, b.username
        FROM recipe as a
        LEFT JOIN user as b
        ON (a.user_id = b.id)
        WHERE a.id = $id_recipe";

$result = $conn->query($selectrecipe);
$recipe = $result->fetch_assoc();

?>

<main class="container-fluid pt-3 pb-5">
    <div class="row">
        <h3 class="col-sm-10 pt-1 pb-2 mt-5 mb-5"><?= $recipe['name'] ?></h3>
        <p id="author" class="text-right col-sm-10">par <span><?= $recipe['username'] ?></span></p>

        <div class="container d-flex justify-content-between">
            <ul class="list-group col-sm-4 pr-3">
                <li class="list-group-item mb-2">1l de Rhum blanc</li>
                <li class="list-group-item mb-2">2 à 3g de Feuilles de Cannelle</li>
                <li class="list-group-item mb-2">4 à 5 Feuilles de Faham</li>
                <li class="list-group-item mb-2">1 bâton de Cannelle</li>
                <li class="list-group-item mb-2">1 gousse de Vanille de qualité</li>
            </ul>

            <div class="col-sm-4 pr-5">
                <img src="../../sources/img/<?= $recipe['img'] ?>" class="col-sm" alt="<?= $recipe['name']?>">
            </div>
        </div>
    </div>

    <div class="row ">
        <h3 class="col-sm-10 pt-1 pb-2 mt-5 mb-5">La recette</h3>
        <p class="container"><?= nl2br($recipe['content']) ?></p>
    </div>

    <?= require"../parts/comment_area.php"; ?>

</main>

<?php
require "../parts/footer.php";
?>
