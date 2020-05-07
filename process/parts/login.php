<?php

/*in case of not connected user (using form)*/
function GetUserByName ($name) {
    global $conn;
    $qry = "SELECT *
            FROM user
            WHERE username = '$name'";
    $result = $conn->query($qry);
    return $result->fetch_assoc();
}

/*in case of already connected user*/
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
        $auth = GetUserByID($_SESSION['id']); ?>

        <span class="float-right pr-2"><a href="user-area.php?id=<?= $auth['id'] ?>" ><?= $auth['username'] ?></a></span>

    <?php } else {
        header("Location: lostpwd.php?as='err'");
    }
}

/*display part*/
if (isset($_SESSION['id'])){
    $auth = GetUserByID($_SESSION['id']); ?>
    <span class="float-right pr-2"><a href="user-area.php?id=<?= $auth['id'] ?>" ><?= $auth['username'] ?></a></span>

<?php } else if (isset($_POST['pwd']) && isset($_POST['login'])) { ?>

    <div id="login-area" class="header-content">
        <form action= "#" method= "post">
            <input type="text" id="login" name="login">
            <input type="password" id="pwd" name="pwd">
            <button class="btn btn-primary">Me connecter</button>
        </form>
        <span class="float-right pr-2"><a href="register.php" >M'inscrire</a> | <a href="lostpwd.php?pwd='forgot'" >Mot de passe oublié</a></span>
    </div>

    <?php
    $auth = GetUserByName($_POST['login']);
    $password = $_POST['pwd'];
    CheckPwd($password, $auth);
} ?>
