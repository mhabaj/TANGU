<?php
require('controllers/functions/control-session.php');

include('controllers/classes/entrainement.php');


?>


<?php

$new_ID_Ent = $_GET['new_ID_Ent'];

?>


    <?php
//////////////////////////////////////////////////////////////////////::

    if (isset($_GET['Serie']) && isset($_GET['new_ID_Ent'])) {


        if (!empty($_GET['Serie']) And is_numeric($_GET['Serie']) and
            !empty($_GET['new_ID_Ent']) And is_numeric($_GET['new_ID_Ent'])) {


            $idSerie = $_GET['Serie'];
            $_SESSION['Serie']= $idSerie ;

            $new_ID_Ent = $_GET['new_ID_Ent'];
            include('controllers/functions/SerieVerif.php');

            if (verifSerieUser($idSerie, $idUser, $new_ID_Ent) == true) {


                ?>


                <p> Volée:</p>

                <form method="GET" id="voleeForm" target="_myFrame" name="voleeForm" action="">

                    <select name='volee' onchange='this.form.submit()'>
                        <option value="<?php echo "null"; ?>"> >>CHOISIR UNE VOLEE<<  </option>


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
                    <input name="new_ID_Ent" type="hidden" value="<?php echo $new_ID_Ent ?>">
                    <input name="Serie" type="hidden" value="<?php echo $idSerie?>">
                    <noscript><input type="submit" value="submit"></noscript>
                </form>


                <?php


                if (isset($_GET['volee'])) {


                    if (!empty($_GET['volee']) And is_numeric($_GET['volee'])) {

                        $idVolee = $_GET['volee'];
                        include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

                        ?>




                <form method="GET" id="FlecheForm" target="_myFrame" name="FlecheForm" action="entrainement.php" >
<?php
                        $reponse = $bdd->query("SELECT * FROM fleche WHERE ID_VOL= '$idVolee' ORDER BY fleche.ID_FLECHE ASC");
                        $n = 1;
                        // On affiche chaque entrée une à une
                        while ($donnees = $reponse->fetch()) {


                            ?>

                            <p> fleche numero<?php echo $donnees['ID_FLECHE'] ; ?></p>
                            <input name="FID<?php echo $n; ?>" type="hidden" type="number" value="<?php echo $donnees['ID_FLECHE']; ?>">
                            <input name="Score<?php echo $n; ?>" type="number"  value="">
                            <input name="new_ID_Ent" type="hidden" value="<?php echo $new_ID_Ent ?>">
                            <input name="Serie" type="hidden" value="<?php echo $idSerie?>">

                            <?php
                            $n++;
                            echo "je suis a l'interieur du trqitement";
                        }
                        ?>

                        <input name="MAX" type="hidden" type="number"  value="<?php echo $n; ?>">

                    <?php
                        $reponse->closeCursor(); // Termine le traitement de la requête

                        ?>
                        <input type="submit" name="MAJFleche" placeholder="Valider">
                        </form>
                        <p><?php echo $n; ?></p>

                        <?php


                        if (isset($_GET['MAJFleche'])) {
                            echo "je suis a l'interieur du if";
                            $j=1;
                            $n =  $_GET['MAX'];

                            while ($j<$n){

                            echo "je suis a l'interieur du while";

                            include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

                            $FID='FID'.$j;
                            $Score='Score'.$j;

                            $FlechID=$_GET[$FID];
                            $points=$_GET[$Score];

                            $req = $bdd->exec("UPDATE `fleche` SET `PTSFLECHE` = '$points' WHERE `fleche`.`ID_FLECHE` = '$FlechID';");

                            // On affiche chaque entrée une à une

                            $j++;

                        }}




                        ?>


                        <?php


                    }


                }


            }
        }
    }

    ?>

<!--
<script type="text/javascript">
    window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 100);

        function submitform(){
            alert('test');
            document.forms["FlecheForm"].submit();
        }

        function autoRefresh(){
            clearTimeout(auto);
            auto = setTimeout(function(){ submitform(); autoRefresh(); }, 10000);
        }
    }
</script>

-->
