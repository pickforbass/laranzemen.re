<?php
require "../parts/header.php";
global $conn;

$qry = "SELECT id, name, img 
        FROM recipe 
        ORDER BY name ASC";
$res = $conn->query($qry);

?>

<h3> LES RECETTES</h3>
<main class="card-container w-100">


    <?php while($recipe = $res->fetch_assoc()){ ?>

        <div class="card">
            <a href="./recipe.php?id=<?= $recipe['id'] ?>">
                <img class="card-img-top" src="../../sources/img/<?= $recipe['img'] ?>" alt="<?= $recipe['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $recipe['name'] ?></h5>
                </div>
            </a>
        </div>

    <?php } ?>

</main>

