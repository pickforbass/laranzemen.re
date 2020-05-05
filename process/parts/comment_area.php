<?php

if (isset($id_recipe)) {
    $qry = "SELECT a.*, b.username 
            FROM comment_recipe as a
            INNER JOIN user as b
            ON a.user_id = b.id
            WHERE recipe_id = $id_recipe
            ORDER BY a.date DESC";
} else if (isset($id_article)) {
    $qry = "SELECT * 
            FROM comment_article
            WHERE article_id = $id_article";
}

$comments = $conn->query($qry);
?>

<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="page-header">
            <h3>Commentaires </h3>
        </div>

        <div class="comments-list">
            <?php
            while ($comment = $comments->fetch_assoc()) {
                $date = date('d-m-Y', strtotime($comment['date']));
            ?>

            <div class="media">
                <div class="media-body">
                    <div class="comment-info">
                        <h4 class="author-name"><?= $comment['username']?></h4>
                        <div class="text-right date"><small><?php echo $date; ?></small></div>
                    </div>
                    <p><?= $comment['content']?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
