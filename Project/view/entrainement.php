<?php

require('../controller/functions/control-session.php');
if (isset($_GET['Serie']) && isset($_GET['new_ID_Ent'])) {


    if (!empty($_GET['Serie']) And is_numeric($_GET['Serie']) and
        !empty($_GET['new_ID_Ent']) And is_numeric($_GET['new_ID_Ent'])) {


        $idSerie = $_GET['Serie'];
        $new_ID_Ent = $_GET['new_ID_Ent'];
        include('../controller/functions/SerieVerif.php');

        if (verifSerieUser($idSerie, $idUser, $new_ID_Ent) == true) {


            ?>


            <p> Volée:</p>

            <form method="POST" id="voleeform">
                <!-- <input  name="new_ID_Ent" type="hidden" value="<?php //echo $new_ID_Ent ?>"> -->



            <select name="volee" form="voleeform">


                <?php

                //$new_ID_Ent = $_GET['new_ID_Ent'];


                include('../controller/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

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

                <input name="submitVolee" type="submit">

            </form>

            <?php


            if (isset($_POST['submitVolee'])) {

                if (!empty($_POST['volee']) And is_numeric($_POST['volee'])) {

                    $idVolee=$_POST['volee'];
                    include('../controller/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

                    $reponse = $bdd->query("SELECT * FROM fleche WHERE ID_VOL= '$idVolee' ORDER BY fleche.ID_FLECHE ASC");
                    $n = 1;
                    // On affiche chaque entrée une à une
                    while ($donnees = $reponse->fetch()) {


                    ?>
                        <p> fleche numero<?php echo $n ?></p>
                        <input  name="ID_VOL" type="number" value="<?php //echo $new_ID_Ent ?>">



                    <?php
                    $n++;
                }

                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>



<?php




                }


            }


        }
    }
}

?>
