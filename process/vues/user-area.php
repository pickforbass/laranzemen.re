<?php
include "../parts/header.php";
global $conn;


?>

<body>
<div class="container-fluid w-100">
    <div class="row">
        <nav class="col-md-2 nav d-none d-md-block bg-black sidebar">
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
                    <h3>Vos recettes</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Ajouter une recette</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3>Vos articles</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Ajouter un article</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3>Vos informations</h3>
                </div>
            </div>
        </main>
    </div>

<?php
require '../parts/footer.php';
