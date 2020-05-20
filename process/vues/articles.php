<?php
require "../parts/header.php";
global $conn;

$res = $conn->query("SELECT id, title, img FROM article ORDER BY title ASC");

?>

<h3 class="col-sm-10 pt-1 pb-2 ml-5 mt-5 mb-5"> Le blog</h3>


<main class="card-container w-100 py-0 d-flex justify-content-start flex-wrap">

    <?php while($article = $res->fetch_assoc()){ ?>
        <a href="./article.php?id=<?= $article['id'] ?>" class="card col-sm-3 m-3 p-0">
        <div>

                <img class="card-img-top" src="../../sources/img/<?= $article['img'] ?>" alt="<?= $article['title'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                </div>
        </div>
        </a>

    <?php } ?>

</main>

<?php
require "../parts/footer.php";
?>

