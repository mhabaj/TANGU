<?php
require_once 'controllers/functions/control-session.php';
$title = "Personnaliser"; ?>
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

    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container-fluid" id="mainBox">
    <?php include_once 'views/includes/header.php'; ?>


    <div class="swiper-container" id="contentBox">
        <div class="text-center">
            <a href="addArc.php">
                <button type="button" class="btn btn-dark">Ajouter</button>
            </a></div>
        <div class="swiper-wrapper">


            <?php


            include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

            $reponse = $bdd->query("SELECT * FROM arc WHERE ID_USER='$idUser'");
            $n = 1;
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {


                ?>


                <div class="container swiper-slide" id="e<?php echo $n; ?>">
                    <h3> <?php echo $donnees['NOMARC']; ?></h3>
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


			   
			   
			   
			   
		
           


	
	
	
	
	

	