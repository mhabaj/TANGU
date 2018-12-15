<?php
function sanitize_pseudo($pseudo) {
    $pseudo = trim($pseudo);
    $pseudo = stripslashes($pseudo);
    $pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
    if(!preg_match("/^[a-zA-Z]+[0-9]*$/", $pseudo)) {
        //Show Error Message
        echo "<script>triggerMessageBox('error', 'Your pseudo is invalid...')</script>";
        die();
    }
    return $pseudo;
}

function sanitize_password($current_pwd, $new_pwd, $confirm_pwd) {
    if((strlen($current_pwd) >= 6 && strlen($current_pwd) <= 30) && (strlen($new_pwd) >= 6 && strlen($new_pwd) <= 30) && (strlen($confirm_pwd) >= 6 && strlen($confirm_pwd) <= 30)) {
        if($current_pwd !== $new_pwd) {
            if($new_pwd === $confirm_pwd) {
                return true;
            } else {
                echo "<script>triggerMessageBox('error', 'Wrong password confirmation')</script>";
                return false;
            }
        } else {
            echo "<script>triggerMessageBox('error', 'You didn\'t change your password...')</script>";
            return false;
        }
    } else {
        echo "<script>triggerMessageBox('error', 'Your password must have 6-30 characters')</script>";
        return false;
    }
}

?>