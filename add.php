<?php
require('controllers/functions/control-session.php');
require_once 'controllers/functions/sanitize.php';
require_once 'controllers/classes/ConnexionBDD.php';
require_once 'controllers/classes/Entrainement.php';
require_once 'controllers/classes/SerieController.php';

$title = "Nouvel Entrainement";
$left_url = "training.php";
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
    <link rel="stylesheet" href="assets/css/addTraining.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/datepicker.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/swiper.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/datepicker.min.js"></script>
    <script src="assets/js/datepicker.fr.js"></script>
    <script src="assets/js/swiper.min.js"></script>
</head>
<body>
<?php include_once 'views/includes/message.php' ;?>
<?php
// Fetch bows and blazons of user to put in select
$db = new ConnexionBDD();
$con = $db->getCon();
$arcs_query = "SELECT ID_ARC, NOMARC FROM arc WHERE ID_USER = ?";
$blasons_query = "SELECT ID_BLAS, NOMBLAS FROM blason WHERE ID_USER = ?";

$arcs_stmt = $con->prepare($arcs_query);
$blasons_stmt = $con->prepare($blasons_query);

$arcs_stmt->execute([$idUser]);
$blasons_stmt->execute([$idUser]);

$arcs = $arcs_stmt->fetchAll();
$blasons = $blasons_stmt->fetchAll();
;?>

<?php
if(isset($_GET['submitBtn'])) {
    if(sanitize_training($_GET['name'], $_GET['location'], $_GET['date'], $_GET['distance'], $_GET['sets'], $_GET['volleys'], $_GET['arrows'])) {
        $name = $_GET['name'];
        $location = $_GET['location'];
        $date = date_create_from_format("d/m/Y h:i A", $_GET['date']);
        $distance = $_GET['distance'];
        $sets = $_GET['sets'];
        $volleys = $_GET['volleys'];
        $arrows = $_GET['arrows'];
        $blason_select = $_GET['blasons'];
        $bow_select = $_GET['bows'];
        if($blason_select != "No blason") {
            $blasonID = (int) $blason_select;
        }

        if($bow_select != "No bow") {
            $arcID = (int) $bow_select;
        }

        $date_time = date_format($date, "Y-m-d H:i");

        $training = new Entrainement($name, $location, $date_time, $distance, $arcID, 1, $sets, $volleys, $arrows, $idUser);
        $serieController = new SerieController($training);
        $_SESSION['serieController'] = serialize($serieController);
    }
}

?>
<?php include 'views/add.view.php'; ?>
</body>
</html>