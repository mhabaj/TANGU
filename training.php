<?php
require 'controllers/functions/control-session.php';
$title = "Entrainements"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style> a {
            color: inherit;
        }</style>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container-fluid" id="mainBox">
    <?php include_once 'views/includes/header.php'; ?>


    <div class="swiper-container" id="contentBox">

        <div class="swiper-wrapper">


            <?php


            include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

            $reponse = $bdd->query("SELECT * FROM entrainement WHERE ID_USER='$idUser' order by ID_ENT_USER asc ");
            $n = 1;
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {


                ?>


                <div class="container swiper-slide" id="e<?php echo $n; ?>">
                    <a href="ChoisirSerie.php?new_ID_Ent=<?php echo $donnees['ID_ENT_USER']; ?>">
                        <div>
                            <h4><i>Nom:</i></h4>
                            <p><?php echo $donnees['NOM_ENT']; ?></p>
                            <h4><i>Lieu</i></h4>
                            <p><?php echo $donnees['LIEU_ENT']; ?></p>
                            <h4><i>Distance</i></h4>
                            <p><?php echo $donnees['DIST_ENT']; ?></p>
                            <h4><i>Date </i></h4>
                            <p><?php echo $donnees['DATE_ENT']; ?></p>

                        </div>
                    </a>
                </div>

                <?php


                $n++;
            }

            $reponse->closeCursor(); // Termine le traitement de la requête


            ?>


        </div>
        <div class="swiper-pagination"></div>
    </div>


</div>

<?php include_once 'views/includes/footer.php'; ?>

<script src="assets/js/swiper.min.js"></script>

</div>

</body>
<script src="assets/js/swiperinc.js"></script>
</html>



