<?php

$type = '';

if (isset($id_recipe)) {
    $qry = "SELECT a.*, b.username 
            FROM comment_recipe as a
            INNER JOIN user as b
            ON a.user_id = b.id
            WHERE recipe_id = $id_recipe
            ORDER BY a.date DESC";
    $type = 'comment_recipe';
    $idvue = $id_recipe;

} elseif (isset($id_article)) {
    $qry = "SELECT a.*, u.username 
            FROM comment_article as a
            INNER JOIN user as u
            ON a.user_id = u.id
            WHERE article_id = $id_article
            ORDER BY a.date DESC";
    $type = 'comment_article';
    $idvue = $id_article;

}

$comments = $conn->query($qry);

if (isset($_POST['delete'])) {
    $id= $_POST['user-id'];
    $del = "DELETE * 
            FROM $type
            WHERE id = $id";

    $conn->query($del);

}

if (isset($_POST['insert-comment'])) {
    $comment = $_POST['insert-comment'];
    $userid = $_SESSION['id'];
    $prepared = $conn->prepare("INSERT INTO $type VALUES (NULL,?, NULL, ?,?)");
$prepared->bind_param("sss", $comment, $userid, $idvue);
$result = $prepared->execute();
}

?>

<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="page-header">
            <h3 class="col-sm-10 pt-1 pb-2 mt-5 mb-5">Commentaires </h3>
        </div>

        <?php
        if (isset($_SESSION['id'])) { ?>
            <form action="#" method="post">
                <textarea name="insert-comment" id="insert-comment"
                       class="w-100 rounded-lg"
                       rows="2"
                       placeholder="Votre commentaire ici">
                </textarea>
                <button type="submit">Envoyer</button>
            </form>
        <?php } ?>


        <div class="comments-list">
            <?php
            while ($comment = $comments->fetch_assoc()) {
                $date = date('d-m-Y', strtotime($comment['date']));
            ?>

            <div class="media">
                <div class="media-body">
                    <div class="comment-info">
                        <h4 class="author-name">
                            <?= $comment['username']?>
                        </h4>
                        <div class="text-right">
                            <span class="mr-1">
                                <small><?php echo $date; ?></small>
                            </span>
                            <?php if (isset($_SESSION['r']) && intval($_SESSION['r'])>1) { ?>
                                <form action="" method="post">
                                    <input type="hidden" value = "<?= $comment['user_id'] ?>" name="user-id">
                                <button type="submit" name="delete">
                                    supprimer
                                </button>
                                </form>
                                

                            <?php } ?>

                            <p>

                            </p>
                        </div>
                    </div>
                    <p><?= $comment['content']?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
