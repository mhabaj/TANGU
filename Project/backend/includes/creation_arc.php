<?php


require('functions.php');

if(isset($_POST['creerArc'])){
	$nomArc = filter_var($_POST['nomArc'], FILTER_SANITIZE_STRING);
	$typeArc = filter_var($_POST['typeArc'], FILTER_SANITIZE_STRING);
	$puissanceArc = filter_var($_POST['puissanceArc'], FILTER_VALIDATE_INT);
	$photoArc = filter_var($_POST['photoArc'], FILTER_SANITIZE_STRING);
    
    if(checkNom($nomArc) && checkType($typeArc) && checkPuissance($puissanceArc) && checkPhoto($photoArc)) {
        echo "checked";
    }
}

var_dump($_POST);
?>