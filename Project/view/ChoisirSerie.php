



<p> Quel serie voudrez vous manipuler?</p>

<form action="entrainement.php" id="serieform" >

    <input type="submit">
</form>

<select name="SerieChoisi" form="serieform">


    <?php

     $new_ID_Ent=$_GET['new_ID_Ent'];

    include('../controller/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

    $reponse = $bdd->query("SELECT * FROM serie WHERE ID_ENT_USER= '$new_ID_Ent'");
    $n = 1;
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch()) {


        ?>


        <option   value="<?php echo $n ?>">Serie
            numero <?php echo $n ?></option>


        <?php
        $n++;
    }

    $reponse->closeCursor(); // Termine le traitement de la requête

    ?>
</select>




<?php

//if(isset($_Get['submitserie'])) {
//  $idSerie = $_POST['pseudo'];
//$mdp = $_POST['mdp'];
//$verif_mdp = $_POST['mdp2'];

//$user = new User($pseudo, $mdp);

//$user->inscription($verif_mdp);
//}

?>