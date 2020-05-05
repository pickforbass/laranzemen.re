<?php

require "../elements/header.php";
global $conn;

$id_recipe = $_GET['id'];
$selectrecipe = "SELECT  a.*, b.username
        FROM recipe as a
        LEFT JOIN user as b
        ON (a.user_iduser = b.iduser)
        WHERE a.id = $id_recipe";

$result = $conn->query($selectrecipe);
$recipe = $result->fetch_assoc();

?>

<main class="container-fluid">
    <div class="row">
        <div class="col-sm">
            <h3><?= $recipe['name'] ?></h3>
            <p>par <span id="author"><?= $recipe['username'] ?></span></p>
            <ul id="ingredients-container" class="list-group">
                <li class="list-group-item">1l de Rhum blanc</li>
                <li class="list-group-item">2 à 3g de Feuilles de Cannelle</li>
                <li class="list-group-item">4 à 5 Feuilles de Faham</li>
                <li class="list-group-item">1 bâton de Cannelle</li>
                <li class="list-group-item">1 gousse de Vanille de qualité</li>
            </ul>
        </div>
        <div class="4-col-sm">
            <img src="../../sources/img/<?= $recipe['img'] ?>" class="img-recipe" alt="<?= $recipe['name']?>">
        </div>
    </div>

    <div class="row ">
        <h3>La recette</h3>
        <p><?= nl2br($recipe['content']) ?></p>
    </div>


</main>

<?php
require "../elements/footer.php";
?>
