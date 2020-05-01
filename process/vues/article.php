<?php
require "../elements/header.php";
global $conn;
$id_article = $_GET['id'];

$article = $conn->query("SELECT * FROM article WHERE id = $id_article");
?>

<main class="container-fluid">
</main>

<?php
require "../elements/footer.php";
?>

