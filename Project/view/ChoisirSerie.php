<p> Quel serie voudrez vous manipuler?</p>
<form method="GET" action="google.fr">
    <select>


        <?php

        include('../controller/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete
        $ID_ENT = 1;
        $reponse = $bdd->query("SELECT * FROM serie WHERE ID_ENT= '$ID_ENT'");
        $n = 1;
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()) {


            ?>


            <option type="submit" name="<?php echo $n ?>" value="<?php echo $n ?>">Serie numero <?php echo $n ?></option>


            <?php
            $n++;
        }

        $reponse->closeCursor(); // Termine le traitement de la requête

        ?>
    </select>


</form>


<?php


    ?>