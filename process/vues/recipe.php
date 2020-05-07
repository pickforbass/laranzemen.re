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

<main class="container-fluid mx-auto">
    <div class="row">
        <h3 class="col-sm-10"><?= $recipe['name'] ?></h3>
        <p id="author" class="text-right col-sm-10">par <span><?= $recipe['username'] ?></span></p>

        <div class="container d-flex justify-content-between">
            <ul id="ingredients-container" class="list-group 6-col-sm">
                <li class="list-group-item mb-2">1l de Rhum blanc</li>
                <li class="list-group-item mb-2">2 à 3g de Feuilles de Cannelle</li>
                <li class="list-group-item mb-2">4 à 5 Feuilles de Faham</li>
                <li class="list-group-item mb-2">1 bâton de Cannelle</li>
                <li class="list-group-item mb-2">1 gousse de Vanille de qualité</li>
            </ul>

            <div class="4-col-sm pr-5">
                <img src="../../sources/img/<?= $recipe['img'] ?>" class="img-recipe" alt="<?= $recipe['name']?>">
            </div>
        </div>
    </div>

    <div class="row ">
        <h3>La recette</h3>
        <p class="container"><?= nl2br($recipe['content']) ?></p>
    </div>

    <?= require"../parts/comment_area.php"; ?>

</main>

<?php
require "../parts/footer.php";
?>
