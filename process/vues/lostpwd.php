<?php
include 'header.php';

$message = base64_decode($_GET['as']);
echo $message . "<br />";

$message = urldecode($message); ?>

<main>
    <div>
        <p><?= $message ?></p>
    </div>

</main>
