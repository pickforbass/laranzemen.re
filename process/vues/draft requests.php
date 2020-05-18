<?php
include '../parts/header.php';

$pics = ['1.png','2.png','3.png','4.png','5.png','6.jpg','7.jpg','8.jpg','9.jpg'];

?>

<div class="container mt-5">
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="4000000">
        <input type="text" name="get-name">
        <input type="file" name="recipe-upload">
        <button type="submit">envoyer</button>
    </form>
</div>

<?php

function testing_size($size) {
    if ($size >= 10000 && $size < 4000000) {
        return true;
    }
}

function testing_type($type) {
    switch($type) {
        case "image/png":
        case "image/jpg":
        case "image/jpeg":
            return true;
            break;
        default:
            return false;
    }
}


if (isset($_FILES['recipe-upload']) && $_FILES['recipe-upload']['error'] == 0) {

    $name = $_FILES['recipe-upload']['name'];
    $size = $_FILES['recipe-upload']['size'];
    $tmp_name = $_FILES['recipe-upload']['tmp_name'];
    $type = $_FILES['recipe-upload']['type'];
    $name = $_FILES['recipe-upload']['name'];
    $route = "../../sources/img/";

    if (testing_size($size)) {
        if (testing_type($type)) {
            print_r(substr($name, -3));
            echo "<br /> $name <br />";
            $name = rename($name,'image.jpg');
            move_uploaded_file($name, $route);
        } else {
            print_r($type);
            echo "Pas le bon type de fichier.";

        }

    } else {
        echo "trop lourd / trop leger";
    }

//            move_uploaded_file($name, $route);

} else {
    echo "bug".$_FILES['recipe-upload']['error']."<br />";
}

//if (isset($_POST['get-name'])) {
//    $name = $_POST['get-name'];
//
//}
