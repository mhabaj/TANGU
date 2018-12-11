<?php
session_start();

if ((!isset($_SESSION['ID'])) || ($_SESSION['ID'] == ''))
{
    header('Location: connexion.php');
    exit();

} else {
    $idUser = $_SESSION['ID'];
}
?>