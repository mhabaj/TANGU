<?php
require_once 'controllers/functions/control-session.php';
require_once 'controllers/classes/ConnexionBDD.php';
$title = "Entrainements"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/training.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper.min.js"></script>
</head>
<body>
<div class="container-fluid" id="mainBox">
    <?php include_once 'views/includes/header.php'; ?>

    <?php
    $bdd = new ConnexionBDD();
    $con = $bdd->getCon();
    $query = "SELECT * FROM entrainement WHERE ID_USER = ?";
    $stmt = $con->prepare($query);
    $stmt->execute([$idUser]);
    $result = $stmt->fetchAll();
    if(count($result) == 0):?>
        <div id="contentBox">No training records</div>
    <?php else:?>

    <div class="swiper-container" id="contentBox">
        <div class="swiper-wrapper">
            <?php foreach ($result as $training):?>
                <div class="swiper-slide">
                    <h3><?= $training['NOM_ENT'];?></h3>
                </div>
            <?php endforeach;?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
        <script src="assets/js/swipy.js"></script>
    <?php endif;?>
    <?php include_once 'views/includes/footer.php'; ?>
</div>
</body>
</html>



