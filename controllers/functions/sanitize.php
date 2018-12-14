<?php
function sanitize_pseudo($pseudo) {
    $pseudo = trim($pseudo);
    $pseudo = stripslashes($pseudo);
    $pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
    if(preg_match("/^[a-zA-Z0-9]*$/", $pseudo)) {

    } else {
        //Show Error Message
    }
}

function showMessage($type, $content) {

}