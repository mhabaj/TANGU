<?php
require_once 'controllers/functions/control-session.php';
require_once 'controllers/classes/ConnexionBDD.php';
require_once 'controllers/functions/functions.php';

$title = "Entrainements"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="assets/css/message.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/training.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper.min.js"></script>
</head>
<body>
<div class="container-fluid" id="mainBox">
    <?php include_once 'views/includes/message.php';?>
    <?php include_once 'views/includes/header.php'; ?>
    <?php
    $bdd = new ConnexionBDD();
    $con = $bdd->getCon();
    $query = "SELECT * FROM entrainement WHERE ID_USER = ?";
    $stmt = $con->prepare($query);
    $stmt->execute([$idUser]);
    $result = $stmt->fetchAll();
    if(count($result) == 0):?>
    <?php echo "<p class=\"no-data\">No training data</p>";?>
    <?php echo "<script>triggerMessageBox('success', 'You have no training yet')</script>"; ?>
    <?php else:?>

    <div class="swiper-container" id="contentBox">
        <div class="swiper-wrapper">
            <?php foreach ($result as $training):?>
                <div class="swiper-slide">
                    <div class="slide-header" id="slideHeader">
                        <div class="blur"></div>
                    </div>
                    <div class="slide-content">
                        <p>Nom: <?= $training['NOM_ENT'];?></p>
                        <p>Lieu: <?= $training['LIEU_ENT'];?>&emsp; Distance: <?= $training['DIST_ENT'];?>m</p>
                        <p class="date">Date: <?= convertStringDate($training['DATE_ENT']);?></p>
                        <p class="nbrs">Serie: <?= $training['NBR_SERIE'];?>, Volées: <?= $training['NBR_VOLEE'];?>, Fleches: <?= $training['NBR_FLECHES'];?></p>
                        <p class="pcts">%10: <?= $training['PCT_DIX'];?>, %9: <?= $training['PCT_NEUF'];?></p>
                        <p class="misc">Points: <?= $training['PTS_TOTAL'];?>, Moyenne: <?= $training['MOY_ENT'];?></p>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
        <script src="assets/js/swipy.js"></script>
    <?php endif;?>
    <?php include_once 'views/includes/footer.php'; ?>
</div>
<script>
    let slides = document.getElementsByClassName("swiper-slide");
    let slideHeaders = document.getElementsByClassName("slide-header"),
        dateText = document.getElementsByClassName("date"),
        nbrsText = document.getElementsByClassName("nbrs"),
        pctText = document.getElementsByClassName("pcts"),
        miscText = document.getElementsByClassName("misc");
    /*

    for(let i = 0; i < slideHeaders.length; i++) {
        slideHeaders[i].addEventListener('touchstart', function (e) {
            slideHeaders[i].style.transition = "height 800ms ease-out, background-position 800ms linear";
            slideHeaders[i].style.height = "50%";
            slideHeaders[i].style.backgroundPosition = "center";
            nbrsText[0].style.display = "block";
            pctText[0].style.display = "block";
            miscText[0].style.display = "block";
        });
        */
        /*
        slideHeaders[i].addEventListener('touchend', function () {
            slideHeaders[i].style.transition = "height 800ms ease-out, background-position 800ms linear";
            slideHeaders[i].style.height = "70%";
            slideHeaders[i].style.backgroundPosition = "bottom";
            nbrsText[0].style.display = "none";
            pctText[0].style.display = "none";
            miscText[0].style.display = "none";
        });

    }*/


</script>
</body>
</html>



