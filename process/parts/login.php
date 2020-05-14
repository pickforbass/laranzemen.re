<?php

function displayConnexion() { ?>
    <div>
        <form action= "#" method= "post">
            <input type="text" id="login" name="login">
            <input type="password" id="pwd" name="pwd">
            <button class="btn btn-primary">Me connecter</button>
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
    </div>
<?php }

function displayHello (array $arr) { ?>
    <span class="float-right pr-2">
        <a href="user-area.php?id=<?= $arr['id'] ?>" >
            <?= $arr['username'] ?>
        </a>
    </span>
<?php }

function GetUserByName ($name) {
    global $conn;
    $qry = "SELECT *
            FROM user
            WHERE username = '$name'";
    $result = $conn->query($qry);
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
        header("Location: lostpwd.php?as='err'");
    }
}


if (isset($_SESSION['id'])){
    $auth = GetUserByID($_SESSION['id']);
    displayHello($auth);
}

if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $auth = GetUserByName($_POST['login']);
    $password = $_POST['pwd'];
    $check = CheckPwd($password, $auth);
    displayHello($check);
}

if (!isset($_POST['login']) || !isset($_POST['pwd']) || !isset($_SESSION['id'])) {
    displayConnexion();
}






