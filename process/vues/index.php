<?php
require "../parts/header.php";
global $conn;

$recipe_result = $conn->query("SELECT name, id, img FROM recipe ORDER BY RAND() LIMIT 3");
$article_result = $conn->query("SELECT * FROM article ORDER BY RAND() LIMIT 3");

?>


<main class="container-fluid mx-auto">
    <div id="incipit" class="col-sm">
        <p class="container">
            Bienvenue les fans du rhum arrangé ! Retrouvez ici les recettes de vos digestifs préférés. Avec une
            infinité de combinaisons possibles, vous n'avez pas fini de tester et déguster tout cela.</br>
            Le rhum arrangé est la maturation de plusieurs fruits ou épices dans un rhum agricole blanc.
            Il est très répandu sur l'île de la Réunion, et dans les Caraïbes d'une manière générale.
        </p>
    </div>

    <h3>Les recettes du moment</h3>
    <div id="recipe-show" class="container col-md d-flex justify-content-around bg-light">
        <?php
        while ($row = $recipe_result->fetch_assoc()){
        ?>
        <a href="recipe.php?id=<?= $row['id'] ?>" class="col-md-3">
            <div class="recipe-content">
                <img src="../../sources/img/<?= $row['img']?>">
                <div>
                    <p><?= $row['name'] ?></p>
                </div>
            </div>
        </a>
        <?php }; ?>
    </div>

    <h3>What's up blog ?!</h3>
    <div class=" container col-md d-flex justify-content-around bg-light">
        <?php
        while ($row = $article_result->fetch_assoc()){
            ?>
            <a href="article.php?id=<?= $row['id'] ?>" class="col-md-4">
                <div class="article-content">
                    <img src="../../sources/img/<?= $row['img'] ?>" height="200px" width="200px">
                    <div class="preview">
                        <p><?= $row['title'] ?></p>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>





</main>

<?php
require "../parts/footer.php";
?>

