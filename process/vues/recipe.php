<?php
require "../elements/header.php";
global $conn;
$id_recipe = $_GET['id'];

$recipe = $conn->query("SELECT * FROM recipe WHERE id = $id_recipe");
?>

<main class="container-fluid">


</main>

<?php
require "../elements/footer.php";
?>
