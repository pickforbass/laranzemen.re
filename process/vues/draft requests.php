<?php
include '../parts/header.php'
//$insert_article = "INSERT INTO article
//                   VALUE (NULL,
//                        '$article_title',
//                        '$article_content',
//                        '$article_img',
//                        NULL,
//                        '$user_id')";
//
//$insert_recipe = "INSERT INTO recipe
//                   VALUE (NULL,
//                        '$recipe_name',
//                        '$user_id',
//                        '$recipe_content',
//                        '$article_img',
//                        NULL,
//                        )";
//


?>
<form action="#" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
    <input type="file" name="recipe-upload">
    <button type="submit">envoyer</button>
</form>

<?php

function testing_size($size) {
    if (!$size >= 1000 && !$size < 4000000)
        echo "Votre fichier est trop lourd ou trop léger (entre 1Ko et 4Mo).";
}

function testing_type($type)
{
    switch($type) {
        case "image/svg+xml":
        case "image/png":
        case "image/jpg":
            return true;
            break;
        default:
            return false;
    }
}


if (isset($_FILES['recipe-upload'])){
    $name = $_FILES['recipe-upload']['name'];
    $size = $_FILES['recipe-upload']['size'];
    $tmp_name = $_FILES['recipe-upload']['tmp_name'];
    $type = $_FILES['recipe-upload']['type'];
    $name = $_FILES['recipe-upload']['name'];

    if (testing_size($size)) {
        echo 'here 0 <br />';
        if (testing_type($type)){
            echo 'here 1 <br />';
        }

    }

    else
    echo "bug".$_FILES['recipe-upload']['error'];
}

