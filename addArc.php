<?php require('controllers/functions/control-session.php');
include('controllers/classes/Arc.php');
include('controllers/functions/functions.php');
include('controllers/functions/uploadImage.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nouvel Arc</title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/addArc.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid" id="mainBox">
    <div class="container-fluid header" id="headerBox">
        <div id="titleBox">
            <h1>Nouveau Arc</h1>
        </div>
        <div id="line">
            <form method="POST" enctype="multipart/form-data">
                <div class="sousline">
                    <h5>Nom de l'arc</h5><input type="text" max="" min="" value="" name="Nomarc">
                </div>

                <div class="sousline">
                    <h5>Poids de l'arc</h5><input type="number" max="50" min="1" value="" name="Poids">
                </div>

                <div class="sousline">
                    <h5>Taille de l'arc</h5><input type="text" value="" max="300" min="1" name="Taille">
                </div>

                <div class="sousline">
                    <h5>Force de l'arc</h5><input type="text" value="" max="100" min="1" name="Force">
                </div>

                <div class="sousline">
                    <h5>Type de l'arc</h5><input type="text" value="" max="50" min="0" name="Type">
                </div>

                <div class="sousline">
                    <h5>Photo de l'arc</h5><input type="image" max="1024" min="1" value="" name="Photo">
                </div>
                <input type="hidden" name="MAX_FILE_SIZE" value="8388608">
                <label for="photo"> Photo (JPG, JPEG, PNG or GIF | max.8 Mo) :</label><br/>
                <input type="file" id="photo" name="photo"/><br/>
                <br>

                <input type="submit" name="envoyerCreateArc">
            </form>

            <?php if (isset($_POST['envoyerCreateArc'])) {



                $nom = htmlspecialchars(($_POST['Nomarc']));
                $poids = $_POST['Poids'];
                $taille = $_POST['Taille'];
                $pwr = $_POST['Force'];
                $type = htmlspecialchars($_POST['Type']);


                if (!empty($nom) && !empty($poids) && !empty($taille) && !empty($pwr) && !empty($type)) {

                    if (is_numeric($taille) and $taille <= 300 && is_numeric($pwr) and $pwr <= 100
                        and is_numeric($poids) and $poids <= 56) {


                        if (checkNom($nom) == true and checkPuissance($pwr) == true and checkType($type) == true) {


                            $photo = uploadImage('arc');

                            $arc = new Arc($nom, $poids, $taille, $pwr, $type, $photo, $idUser);


                        }
                    }
                }
            } else {

                echo '<p> Merci de remplir tous les champs </p>';

            }


            ?>
        </div>

    </div>


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