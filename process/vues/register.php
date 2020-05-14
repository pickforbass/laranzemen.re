<?php
require "../parts/header.php";
global $conn;

?>

<main class="container-fluid mt-5 row">

    <div class="register-container container col-sm-7 mx-auto p-2">
        <div class="col-8 mx-auto p-3">
            <h3 class="col-sm-10 pb-2 ml-5 mt-4 mb-5">S'inscrire</h3>

            <div class="mb-5">
                <form action="#">
                    <p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="new-name"><span class="input-group-text bg-dark text-white border border-dark">Nom d'utilisateur</span></label>
                            </div>
                            <input type="text" class="form-control border border-dark" id="new-name">
                        </div>
                    </p>

                    <p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="new-mail"><span class="input-group-text bg-dark text-white border border-dark">E-mail</span></label>
                            </div>
                            <input type="text" class="form-control border border-dark" id="new-mail">
                        </div>
                    </p>

                    <p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="new-pwd"><span class="input-group-text bg-dark text-white border border-dark">Mot de passe</span></label>
                        </div>
                        <input type="text" class="form-control border border-dark" id="new-pwd">
                    </div>
                    </p>

                    <p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="new-pwd-check"><span class="input-group-text bg-dark text-white border border-dark">Resaisir le mot de passe</span></label>
                            </div>
                            <input type="text" class="form-control border border-dark" id="new-pwd-check">
                        </div>
                    </p>

                    <p class="pb-3">
                        <button class="btn-secondary bg-dark text-white rounded rounded-pill float-right">Valider tout ça !</button>
                    </p>

                </form>
            </div>
        </div>

    </div>


</main>

<?php
include "../parts/footer.php";

