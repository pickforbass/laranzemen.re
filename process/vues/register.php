<?php
require "../parts/header.php";
global $conn;

function register(){?>

    <main class="container-fluid mt-5 row">
        <div class="register-container container col-sm-7 mx-auto p-2">
            <div class="col-8 mx-auto p-3">
                <h3 class="col-sm-10 pb-2 ml-5 mt-4 mb-5">S'inscrire</h3>

                <div class="mb-5">
                    <form action="#" method="post">
                        <p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="new-name">
                                    <span class="input-group-text border border-dark">
                                        Nom d'utilisateur</span>
                                </label>
                            </div>
                            <input type="text"
                                   class="form-control border border-dark"
                                   name="new-name"
                                   id="new-name"
                                   required="true">
                        </div>
                        </p>

                        <p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="new-mail">
                                    <span class="input-group-text border border-dark">
                                        E-mail
                                    </span>
                                </label>
                            </div>
                            <input type="email"
                                   class="form-control border border-dark"
                                   name='new-mail'
                                   id="new-mail"
                                   required="true">
                        </div>
                        </p>

                        <p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="new-pwd">
                                <span class="input-group-text border border-dark">
                                    Mot de passe
                                </span>
                                </label>
                            </div>
                            <input type="password"
                                   class="form-control border border-dark"
                                   name='new-pwd'
                                   id="new-pwd"
                                   required="true">
                        </div>
                        </p>

                        <p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="new-pwd-check">
                                    <span class="input-group-text border border-dark">
                                        Resaisir le mot de passe
                                    </span>
                                </label>
                            </div>
                            <input type="password"
                                   class="form-control border border-dark"
                                   name='new-pwd-check'
                                   id="new-pwd-check"
                                   required="true">
                        </div>
                        </p>

                        <p class="pb-3">
                            <button class="btn-secondary bg-dark text-white rounded rounded-pill float-right">
                                Valider tout ça !
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php }

function registerOK(){ ?>
    <main class="container-fluid mt-5 row">
        <div class="register-container container col-sm-7 mx-auto p-2">
            <div class="col-8 mx-auto p-3">
                <h3 class="col-sm-10 pb-2 ml-5 mt-4 mb-5">Bravo !</h3>

                <div class="mb-5">

                    <p class="text-center">
                        Vous pouvez maintenant vous connecter avec votre compte !
                    </p>
                </div>
            </div>

        </div>
    </main>

<?php }

if (isset($_POST['new-name']) && isset($_POST['new-mail']) &&
    isset($_POST['new-pwd']) && isset($_POST['new-pwd-check'])) {

    $name = $_POST['new-name'];
    $mail = $_POST['new-mail'];
    $pwd = ($_POST['new-pwd'] === $_POST['new-pwd-check']) ? password_hash($_POST['new-pwd'], PASSWORD_BCRYPT) : false;

    $prepared = $conn->prepare("INSERT INTO user VALUES (NULL, ?, ?, ?,'1', NULL, NULL, NULL)");
    $prepared->bind_param("sss", $name, $pwd, $mail);
    $result = $prepared->execute();

    if (!$result) {
        echo "<p class='text-center m-5'> Un problème est survenu. Merci de recommencer.</p>";
        echo "<p class='text-center m-5'>".mysqli_errno($conn)." : </br>".mysqli_error($conn)."</p>";
        register();

    } else {
        registerok();

    }

} else {
    register();
}

include "../parts/footer.php";


