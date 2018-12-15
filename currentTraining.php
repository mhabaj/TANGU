<?php
require('controllers/functions/control-session.php');
require_once 'controllers/functions/sanitize.php';
require_once 'controllers/classes/ConnexionBDD.php';
require_once 'controllers/classes/Entrainement.php';

$title = "Entrainement";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $title;?></title>

    <link rel="stylesheet" href="assets/css/message.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/checkHeader.css">
    <!--<link rel="stylesheet" href="assets/css/modalFormInput.css">-->
    <link rel="stylesheet" href="assets/css/currentTraining.css.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/datepicker.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/swiper.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/confetti.js"></script>
    <script src="assets/js/swiper.min.js"></script>
</head>
<body>
<?php include_once 'views/includes/message.php' ;?>
<?php include 'views/currentTraining.view.php'; ?>
</body>
</html>