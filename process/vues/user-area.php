<?php
include "../parts/header.php";
global $conn;
/*
 * Get infos from user
 */
$id = $_SESSION['id'];


$recipe_req = "SELECT name, id
        FROM recipe 
        WHERE user_id = $id";

$article_req = "SELECT title, id
        FROM article
        WHERE user_id = $id";

$result_r = $conn->query($recipe_req);
$result_a = $conn->query($article_req);


/*
 * checking inputs and file in add-recipe form
 */
function testing_size($size) {
    if ($size >= 10000 && $size < 4000000) {
        return true;
    }
}

function testing_type($tmpfile) {
    $finfo = finfo_open( FILEINFO_MIME_TYPE );
	$mtype = finfo_file( $finfo, $tmpfile );
	finfo_close( $finfo );
	if( $mtype == ( "image/bmp" ) ||
		$mtype == ( "image/jpeg" ) ||
		$mtype == ( "image/png" ) ) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

if (isset($_POST['title-recipe']) && isset($_POST['content-recipe']) && isset($_FILES['recipe-upload']['tmp_name'])){
    $content_recipe = $_POST['content-recipe'];
    $name_recipe = $_POST['title-recipe'];

    if (isset($_FILES['recipe-upload']) && $_FILES['recipe-upload']['error'] == 0) {
        /*
         * Variables needed to check the uploaded file
         */

        $filename = $_FILES['recipe-upload']['name'];
        $size = $_FILES['recipe-upload']['size'];
        $tmp_file = $_FILES['recipe-upload']['tmp_name'];
        $type = $_FILES['recipe-upload']['type'];
        $route = dirname(__FILE__) . "/../../sources/img/";

        if (testing_size($size)) {
            if (testing_type($type)) {
                $newname = "image-". uniqid(). ".jpg";
                $result = move_uploaded_file($tmp_file, $route . $newname);
                /*
                 * Send new recipe
                 */
                $prepared = $conn->prepare("INSERT INTO recipe VALUES (NULL, ?, ?, ?, ?, NULL)");
                $prepared->bind_param("sssi", $name_recipe, $content_recipe, $newname, $id);
                $send = $prepared->execute();

            } else {
                echo "Pas le bon type de fichier.";
            }
        } else {
            echo "trop lourd / trop leger";
        }

    } else {
        echo "bug".$_FILES['recipe-upload']['error']."<br />";
    }
} ?>

<!-- Main part of the view -->
<body>
<div class="container-fluid w-100">
    <div class="row">
        <main role="main"
              class="js-document col-md-9 mx-auto col-lg-10 px-4">
            <!-- Recipe area -->
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3 class="col-sm-9 pt-1 pb-2 ml-5 mt-5 mb-5">Mes recettes</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button id="add-recipe-btn"
                                    type="button"
                                    class="btn btn-sm btn-outline-secondary "
                                    aria-haspopup="dialog"
                                    aria-controls="add-recipe-window">
                                Ajouter une recette
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-striped">
                        <tbody>
                    <?php while ($recipe = $result_r->fetch_assoc()) { ?>
                        <tr>
                            <th scope="row">
                                <a href="./recipe.php?id=<?= $recipe['id']?>">
                                <?= $recipe['name'] ?>
                                </a>
                            </th>
                        </tr>
                    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Article area -->
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3 class="col-sm-9 pt-1 pb-2 ml-5 mt-5 mb-5">Mes articles</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button"
                                    class="btn btn-sm btn-outline-secondary"
                                    aria-haspopup="dialog"
                                    aria-controls="add-article-window">Ajouter un article</button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <tbody>
                    <?php while ($article = $result_a->fetch_assoc()) { ?>
                        <tr>
                            <a href="article.php?id=<?= $article['id']?>">
                                <th>
                                    <?= $article['title'] ?>
                                </th>
                            </a>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>

            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 w-100">
                    <h3 class="col-sm-9 pt-1 pb-2 ml-5 mt-5 mb-5">Vos informations</h3>
                </div>
            </div>
        </main>

        <!-- Adding recipe Modal window -->

        <div id="add-recipe-window"
             role="dialog"
             aria-modal="true"
             aria-hidden="true"
             tabindex="-1"
             class="modal-window position-fixed p-5">
            <div role="document"
                 id="add-recipe-box"
                 class="modal-box col-sm-7 mx-auto position-fixed p-5 my-5 bg-white border border-dark rounded round-lg">
                <h3 class="col-sm-9 pt-1 pb-2 ml-5 mb-5">Ajouter une recette</h3>
                <form action="" method="post">
                    <p>
                        <label for="title-recipe">Nom</label><br>
                        <input type="text" id="title-recipe" class="col-sm-10">
                    </p>
                    <p>
                        <label for="content-recipe">Recette</label><br>
                        <textarea id="content-recipe" class="col-sm-10"></textarea>
                    </p>
                    <p>
                        <label for="recipe-img-upload">Votre image</label><br>
                        <input type="file" name="recipe-image-upload">
                    </p>
                    <button type="submit">Valider</button>
                </form>
            </div>
            <button type="button"
                    aria-dismiss="add-recipe-window"
                    aria-dismiss-box = "add-recipe-box"
                    class="close-btn bg-transparent border-0 position-absolute pt-2">
                <svg class="bi bi-x-circle-fill" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-4.146-3.146a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <!-- Adding article modal window -->
        <div id="add-article-window"
             role="dialog"
             aria-modal="true"
             aria-hidden="true"
             tabindex="-1"
             class="modal-window position-fixed p-5">
            <div role="document"
                 id="add-article-box"
                 class="modal-box col-sm-7 mx-auto position-fixed p-5 my-5 bg-white border border-dark rounded round-lg">
                <h3 class="col-sm-9 pt-1 pb-2 ml-5 mb-5">Ajouter un article</h3>
                <form action="" method="post">
                    <p>
                        <label for="title-article">Titre</label><br>
                        <input type="text" id="title-article" class="col-sm-10">
                    </p>
                    <p>
                        <label for="content-article">Contenu</label><br>
                        <textarea id="content-article" class="col-sm-10"></textarea>
                    </p>
                    <p>
                        <label for="article-img-upload">Votre image</label><br>
                        <input type="file" name="article-image-upload">
                    </p>
                    <button type="submit">Valider</button>
                </form>
            </div>
            <button type="button"
                    aria-dismiss="add-article-window"
                    aria-dismiss-box = "add-article-box"
                    class="close-btn bg-transparent border-0 position-absolute pt-2">
                <svg class="bi bi-x-circle-fill" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-4.146-3.146a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
</div>

    <script src="../../scripts/modals.js"></script>

<?php
require '../parts/footer.php';?>


