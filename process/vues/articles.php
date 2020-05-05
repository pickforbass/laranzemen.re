<?php
require "../elements/header.php";
global $conn;

$id_art = $_GET['id'];
$res = $conn->query("SELECT * FROM article WHERE id = $id_art");

?>


