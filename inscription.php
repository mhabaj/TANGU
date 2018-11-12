<html lang="fr">
<head>
    <title>Inscritpion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
    <?php include_once 'views/inscription.view.php';?>
</body>
</html>

<?php
require_once 'controllers/classes/User.php';

if(isset($_POST['formInscription'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $verif_mdp = $_POST['mdp2'];

    $user = new User($pseudo, $mdp);
    $_SESSION['userInstance'] = $user;
    $_SESSION['userInstance']->inscription($verif_mdp);
}

if(isset($msg)){
    echo $msg;
}
?>
