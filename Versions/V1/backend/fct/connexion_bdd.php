<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "tangubdd";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // PDO mode erreur
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connexion Base de donnees reussie";
}

catch(PDOException $e) {
    die("Erreur de connexion à notre base de données : " . $e->getMessage());
}

?>