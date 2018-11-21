<?php
session_start();

session_unset();
session_destroy();
require_once 'controllers/classes/functions.php';
redirect('connexion.php');
?>