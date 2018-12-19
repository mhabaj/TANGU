<?php
require_once 'controllers/functions/control-session.php';
require_once 'controllers/classes/ConnexionBDD.php';
include('controllers/classes/Blason.php');
$title = "Personnaliser";
$left_url = "edit.php";
$right_url = "addBlason.php";
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="assets/css/message.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/checkHeader.css">
    <link rel="stylesheet" href="assets/css/edits.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper.min.js"></script>
</head>
<body>
<div class="container-fluid" id="mainBox">
    <?php include_once 'views/includes/message.php'; ?>
    <?php include_once 'views/includes/back-header.php'; ?>
    <?php
    $bdd = new ConnexionBDD();
    $con = $bdd->getCon();
    $query = "SELECT * FROM blason WHERE ID_USER = ?";
    $stmt = $con->prepare($query);
    $stmt->execute([$idUser]);
    $result = $stmt->fetchAll();
    if (count($result) == 0):?>
        <?php echo "<script>triggerMessageBox('success', 'vous n\'avez pas de blasons encore')</script>"; ?>
    <?php else: ?>
        <div class="swiper-container" id="contentBox">
            <div class="swiper-wrapper">
                <?php foreach ($result as $blason): ?>
                    <div class="swiper-slide" id="e1">
                        <div  id="contentBox">
                        <p>Nom du blason:  <?= $blason['NOMBLAS'] ?></p>

                        <p>Taille:  <?= $blason['TAILLEBLAS'] ?></p>
                        <?php
                        if (!empty($blason['PHOTOBLAS']) and !is_null($blason['PHOTOBLAS'])) { ?>

                            <img src="<?=$blason['PHOTOBLAS']?>" alt="Photo du blason" height="100" width="100">

                            <?php
                        }
                        ?>
                            <p></p>


                        <form method="POST">
                            <input type="hidden" value="<?= $blason['ID_BLAS'] ?>"
                                   name="B">
                            <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                        </form>
                            <?php

                            if (isset($_POST['delete'])) {

                                $idBlason = $_POST['B'];

                                if (!empty ($idBlason) and is_numeric($idBlason) and !empty($_SESSION['ID']) and is_numeric($_SESSION['ID'])) {

                                    Blason:: supprimerBlason($idBlason, $_SESSION['ID']);

                                }

                                echo '<script>location = location</script>';
                            }
                            ?>
                        </div></div>
                <?php endforeach; ?>


            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script src="assets/js/swipy.js"></script>
    <?php endif; ?>
    <?php include_once 'views/includes/footer.php'; ?>
</div>

<script>
    let rightBtn = document.getElementById("right-btn");
    rightBtn.disabled = false;
    rightBtn.addEventListener('touchend', function () {
        window.location = "<?=$right_url;?>"
    });
</script>

</body>
</html>