<?php
require "../parts/header.php";
global $conn;

$qry = "SELECT id, name, img 
        FROM recipe 
        ORDER BY name ASC";
$res = $conn->query($qry);

?>

<h3 class="col-sm-10 pt-1 pb-2 ml-5 mt-5 mb-5"> Les recettes</h3>
<main class="card-container w-100 py-0 d-flex justify-content-start flew-wrap">


    <?php while($recipe = $res->fetch_assoc()){ ?>

        <a href="./recipe.php?id=<?= $recipe['id'] ?>" class="card col-sm-3 m-3 p-0">
            <div>
                    <img class="card-img-top" src="../../sources/img/<?= $recipe['img'] ?>" alt="<?= $recipe['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $recipe['name'] ?></h5>
                    </div>
            </div>
        </a>

    <?php } ?>

</main>

<?php
require "../parts/footer.php";
?>

