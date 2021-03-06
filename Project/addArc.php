<?php require('controllers/functions/control-session.php');
include('controllers/classes/Arc.php');
include('controllers/functions/functions.php');
include('controllers/functions/uploadImage.php');
$title = "Ajouter un arc";
$left_url = "editArc.php";
$right_url = "#";

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="assets/css/message.css">
    <link rel="stylesheet" href="assets/css/checkHeader.css">
    <link rel="stylesheet" href="assets/css/inputFieldCreator.css">
    <link rel="stylesheet" href="assets/css/addArc.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/inputFieldCreator.js"></script>
</head>
<body>
<?php include 'views/includes/message.php'; ?>
<?php include 'views/addArc.view.php'; ?>
<?php if (isset($msg)) echo $msg; ?>
<?php

if (isset($_POST['envoyerCreateArc'])) {


    $nom = htmlspecialchars(($_POST['Nomarc']));
    $poids = $_POST['Poids'];
    $taille = $_POST['Taille'];
    $pwr = $_POST['Force'];
    $type = htmlspecialchars($_POST['Type']);
    $commArc = nl2br(addslashes($_POST['commArc']));


    if (!empty($nom) && !empty($poids) && !empty($taille) && !empty($pwr) && !empty($type)) {

        if (is_numeric($taille) and $taille <= 300 && is_numeric($pwr) and $pwr <= 100
            and is_numeric($poids) and $poids <= 56) {


            if (checkNom($nom) == true and checkPuissance($pwr) == true and checkType($type) == true) {


                $photo = uploadImage('arc');

                $arc = new Arc($nom, $poids, $taille, $pwr, $type, $commArc,$photo );


            }
        } else {

            echo "<script> triggerMessageBox('error','Veuillez entrer des données valides') </script>";
        }
    } else {

        echo " <script> triggerMessageBox('error','Les champs * sont obligatoires') </script> ";

    }
}


?>

</body>
</html>