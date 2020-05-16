<?php
require "../parts/header.php";
global $conn;

$recipe_result = $conn->query("SELECT name, id, img FROM recipe ORDER BY RAND() LIMIT 3");
$article_result = $conn->query("SELECT * FROM article ORDER BY RAND() LIMIT 3"); ?>


<main class="container-fluid mt-5 row">
    <div class="col-sm-10 mx-auto">
        <p class="container">
            Bienvenue les fans du rhum arrangé ! Retrouvez ici les recettes de vos digestifs préférés. Avec une
            infinité de combinaisons possibles, vous n'avez pas fini de tester et déguster tout cela.</br>
            Le rhum arrangé est la maturation de plusieurs fruits ou épices dans un rhum agricole blanc.
            Il est très répandu sur l'île de la Réunion, et dans les Caraïbes d'une manière générale.
        </p>
    </div>

    <h3 class="col-sm-10 pt-1 pb-2 ml-5 mt-5 mb-5">Les recettes du moment</h3>
    <div class="container col-md-10 d-flex justify-content-around p-0 mb-5 mx-auto bg-light">
        <?php
        while ($row = $recipe_result->fetch_assoc()){
        ?>
        <a href="recipe.php?id=<?= $row['id'] ?>" class="col-md-4">
            <div class="card m-4 bg-white">
                <img src="../../sources/img/<?= $row['img']?>" class="card-img">
                <div class="card-body mt-1">
                    <h4 class="text-center"><?= $row['name'] ?></h4>
                </div>
            </div>
        </a>
        <?php }; ?>
    </div>

    <h3 class="col-sm-10 pt-1 pb-2 mt-5 mb-5">What's up blog ?!</h3>
    <div class=" container col-md-10 d-flex justify-content-around bg-light">
        <?php while ($row = $article_result->fetch_assoc()){ ?>

        <a href="article.php?id=<?= $row['id'] ?>" class="col-md-4">
            <div class="card m-4 bg-white"">
                <img src="../../sources/img/<?= $row['img'] ?>" class="card-img">
                <div class="card-body mt-1">
                    <h4 class="text-center"><?= $row['title'] ?></h4>
                </div>
            </div>
        </a>
        <?php } ?>

    </div>
</main>

<?php
require "../parts/footer.php";
?>

