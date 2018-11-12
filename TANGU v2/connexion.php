<?php include_once 'controllers/functions/control-session.php' ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>connexion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
</head>
<body >
    <?php include_once 'views/connexion.view.php';?>
</body>
</html>
<?php
require_once 'controllers/classes/User.php';

if(isset($_GET['formconnexion'])) {
    $pseudo = $_GET['pseudoconnect'];
    $mdp = $_GET['mdpconnect'];

    $user = new User($pseudo, $mdp);
    $user->connexion();
}
?>