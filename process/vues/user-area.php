<?php
include "../parts/header.php";
global $conn;


?>

<body>
<div class="container-fluid w-100">
    <div class="row">
        <nav class="col-md-2 nav d-none d-md-block bg-dark sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            Vos recettes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Vos articles
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Vos informations personnelles
                    </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3 class="col-sm-9 pt-1 pb-2 ml-5 mt-5 mb-5">Vos recettes</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button id="add-recipe-btn"
                                    type="button"
                                    class="btn btn-sm btn-outline-secondary "
                                    aria-haspopup="dialog"
                                    aria-controls="add-recipe">
                                Ajouter une recette
                            </button>
                        </div>
                    </div>
                </div>
                <div id="add-recipe"
                     role="dialog"
                     aria-modal="true"
                     aria-hidden="true"
                     tabindex="-1"
                     class="modal-window d-flex justify-content-center position-fixed p-5">

                    <div role="document" class="modal-box col-sm-8 mx-auto position-fixed p-3 mt-3 bg-white border border-dark rounded round-lg">
                        <h2 id="dialog-title">Ajouter une recette</h2>
                    <form action="" method="post">
                        <p>
                            <label for="title-recipe">Titre</label><br>
                            <input type="text" id="title-recipe" class="col-sm-10">
                        </p>
                        <p>
                            <label for="content-recipe">Recette</label><br>
                            <input type="text-area" id="content-recipe" class="col-sm-10">
                        </p>
                        <button type="submit">Valider</button>
                    </form>
                    </div>
                    <button type="button"
                            data-dismiss="add-recipe"
                            class="close-btn bg-transparent border-0 position-absolute pt-2">
                        <svg class="bi bi-x-circle-fill" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-4.146-3.146a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3 class="col-sm-9 pt-1 pb-2 ml-5 mt-5 mb-5">Vos articles</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Ajouter un article</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3 class="col-sm-9 pt-1 pb-2 ml-5 mt-5 mb-5">Vos informations</h3>
                </div>
            </div>
        </main>
    </div>


    <script src="../../scripts/modals.js"></script>
<?php
require '../parts/footer.php';
