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
$date = date('d-m-Y', strtotime($article['date']));

?>

<main class="container-fluid">

    <div class="article-img w-100">
        <img src="../../sources/img/<?= $article['img']?>" alt="<?= $article['title']?>">
    </div>

    <div class="article-infos">
        <h3 class="article-title"><?= $article['title']?></h3>
        <p id="author" class="text-right 8-col-sm"><small>par <span><?= $article['username'] ?> | <?= $date ?></span></small></p>
    </div>

    <p><?= nl2br($article['content']) ?></p>

    <?= require"../parts/comment_area.php"; ?>

</main>


<?php
require "../parts/footer.php";
?>

