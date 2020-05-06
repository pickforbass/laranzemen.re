<?php
require "../parts/header.php";
global $conn;

$res = $conn->query("SELECT id, title, img FROM article ORDER BY title ASC");

?>

<h3> LE BLOG</h3>


<main class="card-container w-100">

    <?php while($article = $res->fetch_assoc()){ ?>
        <div class="card">
            <a href="./article.php?id=<?= $article['id'] ?>">
                <img class="card-img-top" src="../../sources/img/<?= $article['img'] ?>" alt="<?= $article['title'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                </div>
            </a>
        </div>

    <?php } ?>

</main>

