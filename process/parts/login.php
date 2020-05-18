<?php

function displayConnexion() { ?>
    <div>
        <form method="post">
            <input type="text" id="login" name="login">
            <input type="password" id="pwd" name="pwd">
            <button class="btn btn-primary" type="submit">Me connecter</button>
        </form>
        <span class="float-right pr-2">
            <a href="register.php" >
                M'inscrire
            </a>
            |
            <a href="lostpwd.php?pwd='forgot'" >
                Mot de passe oublié
            </a>
        </span>
    </div> <?php
}


function displayHello (array $arr) { ?>
    <div class="float-right pr-2 text-right">
        <p>Bonjour <?= $arr['username'] ?></p>

        <div>
            <a href="user-area.php?id=<?= $arr['id'] ?>" >
                Mon espace utilisateur
            </a>
            <form action="index.php" method="post">
                <button type="submit" name="logout" class="btn btn-primary border-0 m-0 p-0">Déconnecter</button>
            </form>
        </div>
    </div><?php
}


function GetUserByName ($name) {
    // TODO transformes moi ca en prepare !!!!!!
    global $conn;
    $qry = "SELECT *
            FROM user
            WHERE username = '$name'";

    if (!$conn->query($qry)) {
        echo "<p class='text-center m-5'> Un problème est survenu. Merci de recommencer.</p>";
        echo "<p class='text-center m-5'>".mysqli_errno($conn)." : </br>".mysqli_error($conn)."</p>";
    } else {
        $result = $conn->query($qry);
    }

    return $result->fetch_assoc();
}


function GetUserByID ($id) {
    global $conn;
    $qry = "SELECT *
            FROM user
            WHERE id = '$id'";
    $result = $conn->query($qry);
    return $result->fetch_assoc();
}


function CheckPwd ($send, array $got) {

    if (password_verify($send, $got['pwd'])) {
        /*Set session*/
        $_SESSION['r'] = $got['rank'];
        $_SESSION['id'] = $got['id'];
        return GetUserByID($_SESSION['id']);

    } else {
        $error = base64_encode(urlencode("Hello les amis je suis une erreur"));

        $error = urldecode("Votre mot de passe est erroné. Veuillez recommencer.");
        $error = base64_encode($error);

        header("Location: lostpwd.php?as=$error");
    }

}


if ( (!isset($_POST['login']) || !isset($_POST['pwd'])) && !isset($_SESSION['id']) ) {
    displayConnexion();

} elseif (isset($_POST['login']) && isset($_POST['pwd'])) {
    $auth = GetUserByName($_POST['login']);
    $password = $_POST['pwd'];
    $check = CheckPwd($password, $auth);

    displayHello($check);

} elseif (isset($_SESSION['id'])){

    $auth = GetUserByID($_SESSION['id']);
    displayHello($auth);
} else {

}
