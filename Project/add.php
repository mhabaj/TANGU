<?php
require_once 'controllers/functions/control-session.php';
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nouveau Entrainement</title>
        
        <link rel="stylesheet" href="assets/csss/header.css">
        <link rel="stylesheet" href="assets/csss/navbar.css">
        <link rel="stylesheet" href="assets/csss/responsive.css">
        <link rel="stylesheet" href="assets/csss/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="sylesheet" href="assets/csss/addBlason.css">
		
        <script src="js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="container-fluid" id="mainBox">
            <div class="container-fluid header" id="headerBox">
                <div id="titleBox">
                    <h1>Nouveau Ent</h1>
              </div>
               <div id="line">
			   
			   
				<form method="POST">
			   
                 <div class="sousline">
				    <input name="nom" placeholder="Nom " maxlength='30' type="text" value=""><br>
					<input name="lieu" placeholder="Lieu " maxlength='200' type="text" value=""><br>
					<input name="date" placeholder="Date" type="datetime-local" value=""><br>
					<input name="distance" placeholder="Distance" min="1" max="126" type="number" value=""><br>
					<select name="arc">

					<option value="null" disabled selected>Choisir un arc</option>

				</form>
			</div>


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
        $ent1 = new entrainement($_POST['nom'], $_POST['lieu'], $_POST['date'], $_POST['distance'], $_POST['arc'], $_POST['blason'], $_POST['serie'], $_POST['volee'], $_POST['fleche'], $idUser);

        /*
            $ID_ENT_USER = $ent1->GetEntID();
            header("Location: ChoisirSerie.php?new_ID_Ent=$ID_ENT_USER");
            die();
    */
    }


    ?>


</div>


<div class="container-fluid footer" id="footerBox">
    <div class="container" id="homeBox">
        <button id="homeBtn">
            <a href="index.php">
                <i class="far fa-list-alt fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="homeBtn2">
            <a href="index.php">
                <i class="far fa-list-alt fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="homeBtn3">
            <a href="index.php">
                <i class="far fa-list-alt fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
    </div>
    <div class="container" id="statsBox">
        <button id="statsBtn">
            <a href="stats.php">
                <i class="fas fa-chart-line fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="statsBtn2">
            <a href="stats.php">
                <i class="fas fa-chart-line fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="statsBtn3">
            <a href="stats.php">
                <i class="fas fa-chart-line fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
    </div>
    <div class="container" id="addBox">
        <button id="addBtn">
            <a href="add.php">
                <i class="fas fa-plus fa-2x" style="color: white"></i>
            </a>
        </button>
        <button id="addBtn2">
            <a href="add.php">
                <i class="fas fa-plus fa-lg" style="color: white"></i>
            </a>
        </button>
        <button id="addBtn3">
            <a href="add.php">
                <i class="fas fa-plus fa-3x" style="color: white"></i>
            </a>
        </button>
    </div>
    <div class="container" id="editBox">
        <button id="editBtn">
            <a href="edit.php">
                <i class="far fa-edit fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="editBtn2">
            <a href="edit.php">
                <i class="far fa-edit fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="editBtn3">
            <a href="edit.php">
                <i class="far fa-edit fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
    </div>
    <div class="container" id="accountBox">
        <button id="accountBtn">
            <a href="account.php">
                <i class="far fa-user fa-2x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="accountBtn2">
            <a href="account.php">
                <i class="far fa-user fa-lg" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
        <button id="accountBtn3">
            <a href="account.php">
                <i class="far fa-user fa-3x" style="color: rgba(179, 179, 179, 0.9)"></i>
            </a>
        </button>
    </div>
</div>
</div>


</body>
</html>