<?php
require_once 'controllers/classes/ConnexionBDD.php';

$db = new ConnexionBDD();
$con = $db->getCon();

$q = $_REQUEST['pseudo'];

echo $q;

?>