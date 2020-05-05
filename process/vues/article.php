<?php
require "../elements/header.php";
global $conn;

$id_article = $_GET['id'];
$result = $conn->query("SELECT * FROM article WHERE id = $id_article");
$article = $result->fetch_assoc();

?>

<main class="container-fluid">
</main>

<?php
require "../elements/footer.php";
?>

<main class="container-fluid">

</main>

<?php
require "../elements/footer.php";
?>