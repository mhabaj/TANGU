<?php require('controllers/functions/control-session.php'); 
include 'views/includes/footer.php';?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nouvel Entrainement</title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/csss/add.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>

<div class="contenu">
    <p> Nouvelle entrainement:</p>

    <form method="POST">
        <input name="nom" placeholder="Nom " maxlength='30' type="text" value=""><br>
        <input name="lieu" placeholder="Lieu " maxlength='200' type="text" value=""><br>
        <input name="date" placeholder="Date" type="datetime-local" value=""><br>
        <input name="distance" placeholder="Distance" min="1" max="126" type="number" value=""><br>


        <!-- SELECT DES ARCS -->
        <select name="arc">

            <option value="null" disabled selected>Choisir un arc</option>


            <?php


            include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

            $reponse = $bdd->query("SELECT ID_ARC, NOMARC FROM arc where ID_USER='$idUser' order by ID_ARC");
            $n = 1;
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {


                ?>


                <option value="<?php echo $donnees['ID_ARC']; ?>"><?php echo $donnees['NOMARC']; ?></option>


                <?php
                $n++;
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>
        </select>

        <!-- BLASON: -->


        <select name="blason">

            <option value="null" disabled selected>Choisir un Blason</option>


            <?php


            include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

            $reponse = $bdd->query("SELECT ID_BLAS, NOMBLAS FROM blason where ID_USER='$idUser' order by ID_BLAS");
            $n = 1;
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {


                ?>


                <option value="<?php echo $donnees['ID_BLAS']; ?>"><?php echo $donnees['NOMBLAS']; ?></option>


                <?php
                $n++;
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>
        </select>


        <input name="serie" placeholder="Serie(s)" min="1" max="5" type="number" value="">
        <input name="volee" placeholder="Volée(s)" min="1" max="10" type="number" value="">
        <input name="fleche" placeholder="Fleche(s)" min="1" max="10" type="number" value="">
        </Br></br>
        <button type="submit" name="creationEnt">
            Creer l'entrainement
        </button>
    </form>

    <?php

    if (isset($_POST['creationEnt'])) {
        require('controllers/classes/entrainement.php');
        $ent1 = new entrainement($_POST['nom'], $_POST['lieu'], $_POST['date'], $_POST['distance'], $_POST['arc'], $_POST['blason'], $_POST['serie'], $_POST['volee'], $_POST['fleche'], 1);

        /*
            $ID_ENT_USER = $ent1->GetEntID();
            header("Location: ChoisirSerie.php?new_ID_Ent=$ID_ENT_USER");
            die();
    */
    }


    ?>


</div>


</div>
</div>


</body>
</html>