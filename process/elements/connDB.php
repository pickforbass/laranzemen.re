<?php

$server = 'localhost';
$username = 'root';
$pwd = '';
$dbn = 'laranzemen';

$conn = new mysqli($server, $username, $pwd);

if ($conn->connect_error) {
    echo 'Erreur connexion '.$conn->connect_error;

} else {
    if($conn->select_db($dbn)){
        mysqli_set_charset ($conn, "utf8");

    } else {
        echo "Erreur connexion à la base de données";

    };
}