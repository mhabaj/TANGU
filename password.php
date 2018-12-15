<?php
require_once 'controllers/functions/control-session.php';
require_once 'controllers/classes/ConnexionBDD.php';
require_once 'controllers/functions/sanitize.php';

$title = "Nouveau Mot de Passe";
$left_url = "account.php";
$right_url = "account.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Nouvel Entrainement</title>

    <link rel="stylesheet" href="assets/css/message.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/checkHeader.css">
    <link rel="stylesheet" href="assets/css/password.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once 'views/includes/message.php' ;?>
<?php include_once 'views/password.view.php';?>
<?php
if(isset($_POST['submitBtn'])) {
    if(!empty($_POST['currentPwd']) && !empty($_POST['newPwd']) && !empty($_POST['confirmPwd'])) {
        if(sanitize_password($_POST['currentPwd'], $_POST['newPwd'], $_POST['confirmPwd'])) {

            try {
                $hashed_current_pwd = sha1($_POST['currentPwd']);
                $hashed_new_pwd = sha1($_POST['newPwd']);

                //Fetch user pwd from database and check if same
                $db = new  ConnexionBDD();
                $con = $db->getCon();

                $query = "SELECT PASSWORD FROM users WHERE ID_USER = ?";
                $stmt = $con->prepare($query);
                $stmt->execute([$idUser]);
                $result = $stmt->fetch();
                if($result[0] != $hashed_current_pwd) {
                    echo "<script>triggerMessageBox('error', 'Forgot your password?')</script>";
                } else {
                    $update_query = "UPDATE users SET PASSWORD = ? WHERE ID_USER = ?";
                    $update_stmt = $con->prepare($update_query);
                    if($update_stmt->execute([$hashed_new_pwd, $idUser])) {
                        echo "<script>triggerMessageBox('success', 'Your password has been changed!')</script>";
                    } else {
                        echo "<script>triggerMessageBox('error', 'An error occured, we\'re sorry)</script>";
                    }

                }
            } catch (PDOException $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }
    }
}
?>
</body>
</html>