<?php require('controllers/functions/control-session.php');
include('controllers/classes/Blason.php');
include('controllers/functions/functions.php');
include('controllers/functions/uploadImage.php');
$title = "Ajouter un Blason";
$left_url = "editBlason.php";
$right_url = "#";
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nouveau Blason</title>


    <link rel="stylesheet" href="assets/css/message.css">
    <link rel="stylesheet" href="assets/css/checkHeader.css">
    <link rel="stylesheet" href="assets/css/addArc.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="sylesheet" href="assets/css/addArc.css">

    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php include 'views/includes/message.php'; ?>
<div class="container-fluid" id="mainBox">
    <?php include 'views/includes/back-header.php'; ?>
    <?php if (isset($msg)) echo $msg; ?>

    <div class="container-fluid" id="formBox">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nom du Blason
                    <mark>*</mark>
                </label>
                <small>(Entre 1 et 20 caractères)</small>
                <input type="Text" class="form-control" max="20" placeholder="Nom du blason" min="1" name="NomBlason">
            </div>


            <div class="form-group">
                <label>Taille du Blason
                    <mark>*</mark>
                </label>
                <small>(Entre 1 et 120)</small>
                <input class="form-control" type="number" placeholder="Taille du Blason" max="127" min="1"
                       name="TailleBlason">
            </div>

            <div class="form-group">
                <h5>Photo du Blason</h5><input type="image" max="1024" value="" name="Photo">

                <input type="hidden" name="MAX_FILE_SIZE" value="8388608">
                <label for="photo"> Photo (JPG, JPEG, PNG or GIF | max.8 Mo) :</label><br/>
                <input type="file" id="photo" name="photo"/><br/>
                <br>
            </div>

            <button type="submit" name="envoyerCreateBlas" class="btn btn-primary">Valider</button>
        </form>
    </div>
    <?php

    if (isset($_POST['envoyerCreateBlas'])) {


        $nom = htmlspecialchars(($_POST['NomBlason']));
        $taille = $_POST['TailleBlason'];
        $idUser = $_SESSION['ID'];


        if (!empty($nom) && !empty($taille)) {


            if (is_numeric($taille) and $taille <= 299) {

                if (checkNom($nom) == true) {


                    $photo = uploadImage('blason');


                    $blason = new Blason($nom, $taille, $photo);


                } else {

                    echo " <script > triggerMessageBox('error', 'Le nom doit être inférieur ou égale à 20 caractères') </script >";;

                }
            } else {

                echo " <script > triggerMessageBox('error', 'Saisie taille invalide') </script >";;

            }

        } else {

            echo " <script > triggerMessageBox('error', 'Veuillez remplir tous des champs') </script >";;

        }
    }


    ?>
    <div class="container-fluid footer" id="footerBox">
        <div class="container" id="homeBox">
            <button id="homeBtn">
                <a href="training.php">
                    <i class="far fa-list-alt fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="homeBtn2">
                <a href="training.php">
                    <i class="far fa-list-alt fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="homeBtn3">
                <a href="training.php">
                    <i class="far fa-list-alt fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
        </div>
        <div class="container" id="statsBox">
            <button id="statsBtn">
                <a href="stats.php">
                    <i class="fas fa-chart-line fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="statsBtn2">
                <a href="stats.php">
                    <i class="fas fa-chart-line fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="statsBtn3">
                <a href="stats.php">
                    <i class="fas fa-chart-line fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
        </div>
        <div class="container" id="addBox">
            <button id="addBtn">
                <a href="add.php">
                    <i class="fas fa-plus fa-2x" style="color: white"></i>
                </a>
            </button>
            <button id="addBtn2">
                <a href="add.php">
                    <i class="fas fa-plus fa-lg" style="color: white"></i>
                </a>
            </button>
            <button id="addBtn3">
                <a href="add.php">
                    <i class="fas fa-plus fa-3x" style="color: white"></i>
                </a>
            </button>
        </div>
        <div class="container" id="editBox">
            <button id="editBtn">
                <a href="edit.php">
                    <i class="far fa-edit fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="editBtn2">
                <a href="edit.php">
                    <i class="far fa-edit fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="editBtn3">
                <a href="edit.php">
                    <i class="far fa-edit fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
        </div>
        <div class="container" id="accountBox">
            <button id="accountBtn">
                <a href="account.php">
                    <i class="far fa-user fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="accountBtn2">
                <a href="account.php">
                    <i class="far fa-user fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
            <button id="accountBtn3">
                <a href="account.php">
                    <i class="far fa-user fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
                </a>
            </button>
        </div>
    </div>
</div>


</body>
</html>
