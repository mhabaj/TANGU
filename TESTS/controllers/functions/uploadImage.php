<?php


function uploadImage($Type)
{

//-----------------------------------------------------
    //Nom de l'image 1
    $userID = $_SESSION['ID'];
    $erreur='';

    if (!file_exists("assets/images/$Type/$userID")) {
        mkdir("assets/images/$Type/$userID", 0700);
    }


    $sousdossier = 'assets/images/' . $Type . '/' . $userID . '/';

    $ph = basename($_FILES['photo']['name']);

    $photo = $sousdossier . $ph;

    // UPLOAD DE L'IMAGE
    $fichier = basename($_FILES['photo']['name']);


    if (!empty($fichier)) {


        $taille_maxi = 8388608;
        $taille = filesize($_FILES['photo']['tmp_name']);
        $extensions = array('.PNG', '.png', '.jpg', '.JPG', '.jpeg', '.JPEG');
        $extension = strrchr($_FILES['photo']['name'], '.');
        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur =  "<script> triggerMessageBox('error','Seulement les photos de type png, jpg, jpeg!') </script>";

        }

        if ($taille > $taille_maxi) {
            $erreur =  "<script> triggerMessageBox('error','Photo trop grande ') </script>";


        }

        if (empty($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $sousdossier . $fichier))
            {
                return $photo;
            } else //Sinon (la fonction renvoie FALSE).
            {
                echo "<script> triggerMessageBox('error','Erreur interne, image non traité') </script>";
                $photo='';
                return $photo;
            }
        } else {
            echo $erreur;
        }


    }
}


//-----------------------------------------------------


?>