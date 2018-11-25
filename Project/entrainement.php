<?php
require('controllers/functions/control-session.php');

include('controllers/classes/entrainement.php');
if (!empty($_SESSION['Serie']) && !empty($_SESSION['new_ID_Ent'])) {
    if (empty($_POST['Serie']) and empty($_POST['new_ID_Ent'])) {

        $_POST['Serie'] = $_SESSION['Serie'];
        $_POST['new_ID_Ent'] = $_SESSION['new_ID_Ent'];
    }
}
if ((!isset($_POST['Serie']) and !isset($_POST['new_ID_Ent'])) and (!isset($_GET['Serie']) and !isset($_GET['new_ID_Ent']))) {

    header('Location:training.php');
} else {


    if ((isset($_POST['Serie']) && isset($_POST['new_ID_Ent']))) {


        if ((!empty($_POST['Serie']) And is_numeric($_POST['Serie']) and
            !empty($_POST['new_ID_Ent']) And is_numeric($_POST['new_ID_Ent']))) {

            $_SESSION['Serie'] = $_POST['Serie'];
            $idSerie = $_SESSION['Serie'];


            $_SESSION['new_ID_Ent'] = $_POST['new_ID_Ent'];
            $new_ID_Ent = $_SESSION['new_ID_Ent'];
        } else {
            header('Location:training.php');
        }
    }

    if ((isset($_GET['Serie']) && isset($_GET['new_ID_Ent']))) {

        if ((!empty($_GET['Serie']) And is_numeric($_GET['Serie'])) and (
                !empty($_GET['new_ID_Ent']) And is_numeric($_GET['new_ID_Ent']))) {

            $_POST['Serie'] = $_GET['Serie'];
            $_SESSION['Serie'] = $_POST['Serie'];
            $idSerie = $_SESSION['Serie'];


            $_POST['new_ID_Ent'] = $_GET['new_ID_Ent'];
            $_SESSION['new_ID_Ent'] = $_POST['new_ID_Ent'];
            $new_ID_Ent = $_SESSION['new_ID_Ent'];
        } else {

            header('Location:training.php');

        }
    }


    if ((isset($idSerie) && isset($new_ID_Ent))) {

        if ((!empty($idSerie) And is_numeric($idSerie)) and (
                !empty($new_ID_Ent) And is_numeric($new_ID_Ent))) {
            //  echo $idSerie;
            //echo ' ';
            //echo $new_ID_Ent;
            //echo ' ';
            //echo $idUser;
            include('controllers/functions/SerieVerif.php');

            if (verifSerieUser($idSerie, $idUser, $new_ID_Ent) == true) {

                ?>

                <p> Choisir une Volée:</p>

                <form method="POST" name="voleeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <select name='volee' onchange='this.form.submit()'>
                        <option value="<?php echo "null"; ?>"> >>CHOISIR UNE VOLEE<<</option>


                        <?php

                        //$new_ID_Ent = $_GET['new_ID_Ent'];


                        include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

                        $reponse = $bdd->query("SELECT * FROM volee WHERE ID_SERIE= '$idSerie' ORDER BY volee.ID_VOL ASC");
                        $n = 1;
                        // On affiche chaque entrée une à une
                        while ($donnees = $reponse->fetch()) {


                            ?>


                            <option value="<?php echo $donnees['ID_VOL'] ?>">Volee numero <?php echo $n ?></option>


                            <?php
                            $n++;
                        }

                        $reponse->closeCursor(); // Termine le traitement de la requête

                        ?>
                    </select>
                    <input name="Serie" type="hidden" value="<?php echo $idSerie; ?>">
                    <input name="new_ID_Ent" type="hidden" value="<?php echo $new_ID_Ent; ?>">

                    <noscript><input type="submit" value="submit"></noscript>
                </form>


                <?php


                if (isset($_POST['volee']) or isset($_SESSION['volee'])) {

                    if (empty($_POST['volee']) and !empty($_SESSION['volee'])) {

                        $_POST['volee'] = $_SESSION['volee'];
                    }

                    if (!empty($_POST['volee']) And is_numeric($_POST['volee'])) {


                        $_SESSION['volee'] = $_POST['volee'];
                        $idVolee = $_SESSION['volee'];
                        include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

                        ?>


                        <form method="POST" class="autoSubmit" name="FlecheForm"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <?php
                            $reponse = $bdd->query("SELECT * FROM fleche WHERE ID_VOL= '$idVolee' ORDER BY fleche.ID_FLECHE ASC");
                            $n = 1;
                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse->fetch()) {


                                ?>

                                <p> fleche numero<?php echo $n; ?></p>
                                <input name="FID<?php echo $n; ?>" type="hidden" type="number"
                                       value="<?php echo $donnees['ID_FLECHE']; ?>">
                                <input id="Score_Submit" name="Score<?php echo $n; ?>" type="number"
                                       value="<?php echo $donnees['PTSFLECHE']; ?>">


                                <?php
                                $n++;
                                //  echo "je suis a l'interieur du trqitement";
                            }
                            ?>



                            <?php
                            $reponse->closeCursor(); // Termine le traitement de la requête

                            ?>
                            <input name="MAX" type="hidden" type="number" value="<?php echo $n; ?>">
                            <input name="Serie" type="hidden" value="<?php echo $idSerie; ?>">
                            <input name="new_ID_Ent" type="hidden" value="<?php echo $new_ID_Ent; ?>">
                            <input name="new_ID_Ent" type="hidden" value="<?php echo $new_ID_Ent; ?>">
                            <input name="volee" type="hidden" value="<?php echo $idVolee; ?>">
                            <input name="verif" type="hidden" value="0">


                            <!-- <input type="submit" name="MAJFleche" placeholder="Valider"> -->
                        </form>
                        <!-- <p><?php //echo $n; ?></p> -->

                        <?php


                        if (isset($_POST['verif'])) {
                            //echo "je suis a l'interieur du if";
                            $j = 1;
                            $n = $_POST['MAX'];

                            while ($j < $n) {

                                //  echo "je suis a l'interieur du while";

                                include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

                                $FID = 'FID' . $j;
                                $Score = 'Score' . $j;
                                $FlechID = intval($_POST[$FID]);
                                $points = intval($_POST[$Score]);


                                $req = $bdd->exec("UPDATE `fleche` SET `PTSFLECHE` = '$points' WHERE `fleche`.`ID_FLECHE` = '$FlechID';");

                                // On affiche chaque entrée une à une

                                $j++;

                            }
                            if ($j = $n - 1) {

                               // echo('<p> Score mis à jour. </p>');

                               // header('Location:views/redirect.php');
                                header('Location:entrainement.php');

                            }

                        }
                    }
                }
            } else {

                header('Location:training.php');

            }
        } else {

            header('Location:training.php');

        }

    }
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('input[id="Score_Submit"]').change(function () {
            $(this).parent().submit();
        });
    });</script>
