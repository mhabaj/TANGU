<?php

/*
 *!!!!!!!!!!!!! DO NOT DELETE THESE FUNCTIONS !!!!!!!!!!!!!
 *
 *
 */
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

function sanitize_training($name, $location, $date, $distance, $series, $volleys, $arrows) {
    $name = stripslashes(trim($name));
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $location = stripslashes(trim($location));
    $location = filter_var($location, FILTER_SANITIZE_STRING);


    if(!empty($name) && !empty($location) && !empty($date) && !empty($distance) && !empty($series) && !empty($volleys) && !empty($arrows)) {
        if(strlen($name) >= 6 && strlen($name) <= 50) {
            if(strlen($location) >= 3 && strlen($location) <= 200) {
                if($distance >= 1 && $distance <= 30) {
                    if($series >=1 && $series <= 4) {
                        if($volleys >= 1 && $volleys <= 10) {
                            if($arrows >= 1 && $arrows <= 10) {
                                return true;
                            } else {
                                echo "<script>triggerMessageBox('error', 'Invalid arrows')</script>";
                                return false;
                            }
                        } else {
                            echo "<script>triggerMessageBox('error', 'Invalid volleys')</script>";
                            return false;
                        }
                    } else {
                        echo "<script>triggerMessageBox('error', 'Invalid sets')</script>";
                        return false;
                    }
                } else {
                    echo "<script>triggerMessageBox('error', 'Invalid distance')</script>";
                    return false;
                }
            } else {
                echo "<script>triggerMessageBox('error', 'Invalid location')</script>";
                return false;
            }
        } else {
            echo "<script>triggerMessageBox('error', 'Invalid name')</script>";
            return false;
        }
    } else {
        echo "<script>triggerMessageBox('error', 'Fill everything')</script>";
        return false;
    }

}

?>