<?php require("../backend/includes/control-session.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SLT TANGU IS ONLINE </title>
</head>
<body>
<p>TANGU IS HERE HAHAHAHAHAHAHHAHAHAHAHAHAHAHHAHAHAHHAA</p>


<p> Test Userid : <br>
    reçu: <?php echo $idUser ?>

</p>


<p> TEST TABLEAUX:</p>

<div>

    <?php
    //arc:


    include ('../backend/includes/fonctionAffichage.php');

    $req="SELECT NOMARC,POIDSARC, TAILLEARC, PWRARC, TYPEARC, PHOTOARC FROM arc WHERE ID_USER= '$idUser'";

    affichage(connexion_requete($req));

//////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///Blason:
    include ('../backend/includes/fonctionAffichage.php');

    $req="SELECT NOMBLAS, TAILLEBLAS,PHOTOBLAS FROM blason WHERE ID_USER= '$idUser'";

    affichage(connexion_requete($req));

    ?>


</div>

<a href="../backend/includes/deconnexion.php"> <button type="button" class="btn btn-xs btn-rouge deco">Disconnect</button> </a>
</body>
</html>