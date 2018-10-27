<?php

if(isset($_POST['formconnexion'])) {
    $pseudo = $_POST['pseudoconnect'];
    $mdp = $_POST['mdpconnect'];
    
    $user = new User($pseudo, $mdp);
    
    $user->connexion();
}

if(isset($msg)){
    echo $msg;
}

?>