<?php

if(isset($_POST['formInscription'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $verif_mdp = $_POST['mdp2'];
    
    $user = new User($pseudo, $mdp);
    
    $user->inscription($verif_mdp);
}

if(isset($msg)){
    echo $msg;
}
?>