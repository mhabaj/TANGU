<?php

<<<<<<< HEAD
include ('../controller/classes/entrainement.php');


?>
<form method="GET">
<?php
=======
require('../controller/functions/control-session.php');
if (isset($_GET['Serie']) && isset($_GET['new_ID_Ent'])) {


    if (!empty($_GET['Serie']) And is_numeric($_GET['Serie']) and
        !empty($_GET['new_ID_Ent']) And is_numeric($_GET['new_ID_Ent'])) {
>>>>>>> 4844864a54ea1230bbd57c6fbe45ce6f0153feec

$stmt = $bdd->query("SELECT * FROM `serie` WHERE ID_USER='$ID_user' and ID_ENT_USER='$'");

<<<<<<< HEAD
$nbrOccur = $stmt->rowCount();

if ($nbrOccur == 0) {


?>

    <select name="Serie">
        <option value="" selected></option>
        <option value=""></option>
        <option value=""></option>
    </select>
</form>
=======
        $idSerie = $_GET['Serie'];
        $new_ID_Ent = $_GET['new_ID_Ent'];
        include('../controller/functions/SerieVerif.php');

        if (verifSerieUser($idSerie, $idUser, $new_ID_Ent) == true) {


            ?>

>>>>>>> 4844864a54ea1230bbd57c6fbe45ce6f0153feec

            <p> Volée:</p>

<<<<<<< HEAD
=======
            <form method="POST" id="voleeform">
                <!-- <input  name="new_ID_Ent" type="hidden" value="<?php //echo $new_ID_Ent ?>"> -->
>>>>>>> 4844864a54ea1230bbd57c6fbe45ce6f0153feec



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
