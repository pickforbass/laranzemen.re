<?php
require "../parts/header.php";
global $conn;

$id_article = $_GET['id'];
$qry = "SELECT  a.*, u.username
        FROM article as a
        LEFT JOIN user as u
        ON (a.user_id = u.id)
        WHERE a.id = $id_article";
$result = $conn->query($qry);
$article = $result->fetch_assoc();

?>

<main class="container-fluid">
    <div class="article-img w-100">
        <img src="../../sources/img/<?= $article['img']?>" alt="<?= $article['title']?>">
    </div>
    <?= require"../parts/comment_area.php"; ?>
</main>


<?php

require "../parts/footer.php";
?>

