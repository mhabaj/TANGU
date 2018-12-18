<?php

function checkMdp($mdp) {
    //Checker la longueur min = 6, max=50
    if(strlen($mdp)>= 6 && strlen($mdp) <= 50) {
        return true;
    } else {
        echo "<p>Mdp doit etre compris en 6 et 50 char";
        return false;
    }
    
}

function convertStringDate($date) {
    // Convert date and time to seconds
    $sec = strtotime($date);

    //Convert seconds to a format
    $date = date("D. M. Y H:i", $sec);
    return $date;
}

function equivMdp($mdp, $verif_mdp) {
    $hash_mdp = sha1($mdp);
    $hash_verif = sha1($verif_mdp);

    if($hash_mdp == $hash_verif) {
        return true;
    } else {
        echo "<p>Mdps non identiques</p>";
        return false;
    }
}

function checkPseudo($pseudo) {
    global $bdd;
    
    $filter_pseudo = filter_var(trim($pseudo), FILTER_SANITIZE_STRING);
    
    if(!empty($filter_pseudo)) {
        if(strlen($filter_pseudo) <= 20) {
            if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pseudo)) {
                return true;
            } else {
                echo "<p>Pas de char spéciaux</p>";
                return false;
            }
        } else {
            echo "<p>Max 20 char</p>";
            return false;
        }
    } else {
        echo "<p>Pseudo ne doit pas etre vide</p>";
        return false;
    }
}

function checkExistPseudo($pseudo) {
    global $bdd;
    
    $stmt = $bdd->query("SELECT PSEUDO FROM users WHERE users.PSEUDO='$pseudo'");
    $nbrOccur = $stmt->rowCount();
    
    if($nbrOccur == 0) {
        return true;
    } else {
        echo "<p>Pseudo existe deja</p>";
        return false;
    }
}

function checkNom($nom){
    if(!empty($nom) && (strlen($nom) <= 20)) {
        return true;
    }
    return false;
}

function checkType($type) {
    if(!empty($type) && (strlen($type) <= 20)) {
        return true;
    }
    return false;
}

function checkPuissance($puissance) {
    if(!empty($puissance) && is_numeric($puissance) &&($puissance < 40)) {
        return true;
    }
    return false;
}

function checkPhoto($photo) {
    if(!empty($photo) && (strlen($photo)) <= 30) {
        return true;
    }
    return false;
}







?>