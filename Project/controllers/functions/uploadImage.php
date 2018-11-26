<?php


function uploadImage($Type)
{

//-----------------------------------------------------
    //Nom de l'image 1
    $userID = $idUser;


    if (!file_exists("assets/images/$Type/$userID")) {
        mkdir("assets/images/$Type/$userID", 0700);
    }


    $sousdossier = '../images/$Type/' . $userID . '/';

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
            $erreur = '<font color="red">Seulement les photos de type png, jpg, jpeg only!</font>';
        }
        if ($taille > $taille_maxi) {
            $erreur = 'La taille de la photo est trop grand! ';
        }
        if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $sousdossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                //  echo 'Photo envoyé avec succes!';
            } else //Sinon (la fonction renvoie FALSE).
            {
                echo "Un problème est survenue lors de l'envoie de votre image !";
            }
        } else {
            echo $erreur;
        }

        return $photo;
    }
}


//-----------------------------------------------------


?>