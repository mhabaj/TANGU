<?php

  if (isset($_POST['formconnexion'])) {  //Si on clique sur le boutton
    $pseudoconnect = trim(htmlentities($_POST['pseudoconnect']));
    $mdpconnect = SHA1(($_POST['mdpconnect']));  //on utilise la fonction SHA1 pour la securite
    if (!empty($pseudoconnect) and !empty($mdpconnect) ) {//si les champs ne sont pas vide, alors:
        include('connexion_bdd.php'); //on se connect à la base

        $requser = $bdd->prepare("SELECT * FROM users where PSEUDO=? and PASSWORD=?");

        $requser->execute(array($pseudoconnect, $mdpconnect));
        $userexist = $requser->rowCount(); //on compte le nombre de reponses envoyee par la base pour voir si le user existe
        if ($userexist == 1) {
            session_start();
            $userinfo = $requser->fetch();
            $_SESSION['ID'] = $userinfo['ID_USER'];
            $_SESSION['PSEUDO'] = $userinfo['PSEUDO'];
            $User_ID= $userinfo;

            header("Location:../frontend/index.php");
        } else {
            $erreur = "Mauvais combinaison nom d'utilisateur ou mot de passe";
        }
    } else {
        $erreur = "Merci de completer tous les informations requis pour vous connecter";
    }
}
?>
