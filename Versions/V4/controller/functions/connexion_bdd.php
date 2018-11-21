<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "tangubdd";



//try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // PDO mode erreur
  //  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<p>Connexion BDD reussie</p>";
//}
//catch(PDOException $e) {
  //  die("Erreur connexion bdd : " . $e->getMessage());
//}

?>