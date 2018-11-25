<?php

// Fonction qui verifie si l'utilisateur est bien le proprietaire des series/entrainements données.
function verifSerieUser($Serie, $ID_user, $ID_Ent)
{


    $new_ID_Ent = ($ID_Ent);

    // on verifie si l'utilisateur qui manipule la serie est le même qui l'a creer:
    include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete


    $stmt = $bdd->query("SELECT * FROM entrainement WHERE ID_USER='$ID_user' and ID_ENT_USER='$new_ID_Ent'");
    $nbrOccur = $stmt->rowCount();

    if ($nbrOccur == 1) {

        $stmt2 = $bdd->query("SELECT * FROM serie WHERE ID_SERIE='$Serie' and ID_ENT_USER='$new_ID_Ent'");
        $nbrOccur2 = $stmt2->rowCount();

        if ($nbrOccur2 == 1) {

            //si l'entrainement existe bien sous le numero de l'utilisateur connecté et
            //  que la serie existe bien sous le numero de lentrainement+utilisateur:

            echo 'MARCHE  ';

            $bdd=null;
            return true;

        }else{
           // echo 'MARCHE PAS ';
            $bdd=null;

            return false;
        }
    }else{
        //echo 'MARCHE PAS ';
        //$bdd=null;


        return false;
    }

}


?>