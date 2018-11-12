<?php
session_start();
//include '../classes/functions.php';

if ((!isset($_SESSION['ID'])) || ($_SESSION['ID'] == ''))
{
    header('Location : connexion.php');
} else {
    $url = "";
    header('Location: ' . $url);
}
?>