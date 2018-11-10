<?php require("../controller/functions/control-session.php") ?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personnaliser</title>

    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/edit.css">
    <link rel=stylesheet href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/swiper.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="../assets/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid" id="mainBox">
    <div class="container-fluid header" id="headerBox">
        <div id="titleBox">
            <h1>Entrainements</h1>
        </div>
        <div id="line"></div>
    </div>



<br>
    <br>
            <?php

            include('../controller/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

            $reponse = $bdd->query("SELECT * FROM entrainement WHERE ID_USER= '$idUser'");
            $n = 1;
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {


            ?>



                <br>
                <br>





                <strong> Nom :</Strong><a href=""><?php echo htmlentities($donnees['NOM_ENT']); ?></a><br>
                <strong> Lieu :</Strong> <?php echo htmlentities($donnees['LIEU_ENT']); ?><br>
                <strong> Date :</Strong> <?php echo htmlentities($donnees['DATE_ENT']); ?><br>
                <strong> Distance :</Strong> <?php echo htmlentities($donnees['DIST_ENT']); ?><br>
                <strong> Series :</Strong> <?php echo htmlentities($donnees['NBR_SERIE']); ?><br>
                <strong> Volee :</Strong> <?php echo htmlentities($donnees['NBR_VOLEE']); ?><br>
                <strong> Fleches :</Strong> <?php echo htmlentities($donnees['NBR_FLECHES']); ?><br>
                <strong> Total des points :</Strong> <?php echo htmlentities($donnees['PTS_TOTAL']); ?><br>
                <strong> % Dix :</Strong> <?php echo htmlentities($donnees['PCT_DIX']); ?><br>
                <strong> % Neuf :</Strong> <?php echo htmlentities($donnees['PCT_NEUF']); ?><br>
                <strong> MOY_ENT :</Strong> <?php echo htmlentities($donnees['MOY_ENT']); ?><br>






        <?php
        $n++;
        }

        $reponse->closeCursor(); // Termine le traitement de la requête

        ?>






</div>
<div class="container-fluid footer" id="footerBox">
    <div class="container" id="homeBox">
        <button id="homeBtn">
            <a href="index.html">
                <i class="far fa-list-alt fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="homeBtn2">
            <a href="index.html">
                <i class="far fa-list-alt fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="homeBtn3">
            <a href="index.html">
                <i class="far fa-list-alt fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
    </div>
    <div class="container" id="statsBox">
        <button id="statsBtn">
            <a href="stats.html">
                <i class="fas fa-chart-line fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="statsBtn2">
            <a href="stats.html">
                <i class="fas fa-chart-line fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="statsBtn3">
            <a href="stats.html">
                <i class="fas fa-chart-line fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
    </div>
    <div class="container" id="addBox">
        <button id="addBtn">
            <a href="add.html">
                <i class="fas fa-plus fa-2x" style="color: white"></i>
            </a>
        </button>
        <button id="addBtn2">
            <a href="add.html">
                <i class="fas fa-plus fa-lg" style="color: white"></i>
            </a>
        </button>
        <button id="addBtn3">
            <a href="add.html">
                <i class="fas fa-plus fa-3x" style="color: white"></i>
            </a>
        </button>
    </div>
    <div class="container" id="editBox">
        <button id="editBtn">
            <a href="edit.html">
                <i class="far fa-edit fa-2x" style="color: rgba(0, 0, 0, 0.9)"></i>
            </a>
        </button>
        <button id="editBtn2">
            <a href="edit.html">
                <i class="far fa-edit fa-lg" style="color: rgba(0, 0, 0, 0.9)"></i>
            </a>
        </button>
        <button id="editBtn3">
            <a href="edit.html">
                <i class="far fa-edit fa-3x" style="color: rgba(0, 0, 0, 0.9)"></i>
            </a>
        </button>
    </div>
    <div class="container" id="accountBox">
        <button id="accountBtn">
            <a href="account.html">
                <i class="far fa-user fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="accountBtn2">
            <a href="account.html">
                <i class="far fa-user fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="accountBtn3">
            <a href="account.html">
                <i class="far fa-user fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
    </div>
</div>
</div>


</body>
</html>