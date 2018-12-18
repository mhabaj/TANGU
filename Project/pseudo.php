<?php
require_once 'controllers/functions/control-session.php';
require_once 'controllers/classes/ConnexionBDD.php';
require_once 'controllers/functions/sanitize.php';
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

    <link rel="stylesheet" href="assets/css/message.css">
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
<?php include_once 'views/includes/message.php' ;?>
<?php include_once 'views/pseudo.view.php';?>
<?php

if(isset($_POST['submitBtn'])) {
    if(!empty($_POST['newPseudo'])) {
        try {
            $newPseudo = $_POST['newPseudo'];
            $newPseudo = sanitize_pseudo($newPseudo);
            $db = new ConnexionBDD();
            $con = $db->getCon();

            $check_pseudo_query = "SELECT COUNT(*) FROM users WHERE PSEUDO = ?";
            $check_stmt = $con->prepare($check_pseudo_query);
            $check_stmt->execute([$newPseudo]);
            $check_result = $check_stmt->fetch();
            if($check_result[0] != 0) {
                echo "<script>triggerMessageBox('error', 'This pseudo already exists...')</script>";
            } else {
                $query = "UPDATE users SET PSEUDO = ? WHERE ID_USER = ?";
                $stmt = $con->prepare($query);
                if($stmt->execute([$newPseudo, $idUser])) {
                    echo "<script>triggerMessageBox('success','Your pseudo has been updated!')</script>";
                } else {
                    echo "<script>triggerMessageBox('error', 'An error occured, we\'re sorry)</script>";
                }
            }
        } catch (PDOException $e) {
            echo "Message " . $e->getMessage();
        }
    } else {
        echo "<script>triggerMessageBox('error', 'It\'s empty dude...')</script>";
    }
}

?>
</body>
</html>