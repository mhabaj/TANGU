<?php
require_once 'controllers/functions/control-session.php';
$title = "Nouveau Pseudo";
$left_url = "account.php";
$right_url = "account.php";
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?=$title;?></title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/checkHeader.css">
    <link rel="stylesheet" href="assets/css/pseudo.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once 'views/pseudo.view.php';?>
<?php if(isset($_POST['submitBtn'])) {
    if(isset($_POST['newPseudo']) && !empty($_POST['newPseudo'])) {
        $newPseudo = $_POST['newPseudo'];
        $newPseudo = trim($newPseudo);
        $newPseudo = stripslashes($newPseudo);
        $newPseudo = filter_var($newPseudo, FILTER_SANITIZE_STRING);
        if(preg_match("/^[a-zA-Z0-9]*$/", $newPseudo)) {
            echo '<script>alert("' . $newPseudo . '");</script>';
        } else {
            echo '<script>alert("not good");</script>';
        }

    }
} ;?>
</body>
</html>