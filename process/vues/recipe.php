<?php

require "../parts/header.php";
global $conn;

$id_recipe = $_GET['id'];
$selectRecipe = "SELECT  a.*, b.username
        FROM recipe as a
        LEFT JOIN user as b
        ON (a.user_id = b.id)
        WHERE a.id = $id_recipe";
$result = $conn->query($selectRecipe);
$recipe = $result->fetch_assoc();

$getIngredients = "SELECT i.name, q.qty, q.unity
                 FROM ingredient as i
                 INNER JOIN  ingr_qty as q
                 ON q.ingredient_id = i.id
                 WHERE q.recipe_id = $id_recipe";

$res2 = $conn->query($getIngredients); ?>

<main class="container-fluid pt-3 pb-5">
    <div class="row">

        <h3 class="col-sm-10 pt-1 pb-2 mt-5 mb-5">
            <?= $recipe['name'] ?>
        </h3>
        <p id="author" class="text-right col-sm-10">
            <span>
                par <?= $recipe['username'] ?>
            </span>
        </p>

        <div class="container d-flex justify-content-between">
            <ul class="list-group col-sm-4 pr-3">
                <li class="list-group-item mb-2">
                        <svg class="bi bi-caret-left-fill"
                             id='minus' width="1em"
                             viewBox="0 0 16 16"
                             fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 00-1.659-.753l-5.48 4.796a1 1 0 000 1.506z"/>
                        </svg>
                    <span id="liter">1</span>
                        <svg class="bi bi-caret-right-fill" id='plus' width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 011.659-.753l5.48 4.796a1 1 0 010 1.506z"/>
                        </svg>
                    <span> L de rhum blanc</span>
                </li>

                <?php while ($ingredient = $res2->fetch_assoc()){ ?>
                <li class="list-group-item mb-2">
                    <span class='ingredient' data-qty="<?= $ingredient['qty'] ?>"
                          data-unit="<?= $ingredient['unity'] ?>"
                          data-name="<?= $ingredient['name'] ?>"></span>
                    <span><?= $ingredient['name']?></span>
                </li>
                <?php } ?>
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

<script src="../../scripts/script.js"></script>
<?php
require "../parts/footer.php"; ?>
