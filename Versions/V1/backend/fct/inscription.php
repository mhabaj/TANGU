<?php


if (isset($_POST['forminscription'])) {



    if (!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) { //on verifie si les champs ne sont pas vides
        $pseudo = htmlentities(trim($_POST['pseudo'])); //format le pseudo
        $mdp = sha1($_POST['mdp']); //on crypte le mdp
        $mdp2 = sha1($_POST['mdp2']);
       // if (strpos($pseudo, '.')!== false and strpos($pseudo, '$')!== false and strpos($pseudo, '&')!== false and strpos($pseudo, '-')!== false
         //   and strpos($pseudo, ' ')!== false and strpos($pseudo, '"')!== false and strpos($pseudo, '=')!== false)  {
        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pseudo) ){


            $pseudolength = strlen($pseudo);
            if ($pseudolength <= 20) {
                if ($mdp == $mdp2) {
                    include('connexion_bdd.php'); //on se connect à la base
                    $verifUserExist = $bdd->query("Select PSEUDO from users where users.PSEUDO='$pseudo'");//on prepare la requete pour l'insertion des donnees das la base si tous les criteres sont bons.
                    $nombre_de_reponses = $verifUserExist->rowCount();
                    if ($nombre_de_reponses == 0) {

                        $insertmbr = $bdd->prepare("INSERT INTO users (PSEUDO, PASSWORD) VALUES(?, ?)");
                        //on prepare la requete pour l'insertion des donnees das la base si tous les criteres sont bons.
                        $insertmbr->execute(array($pseudo, $mdp));
                        $erreur = "<p>Votre compte est crée! <a href='../../frontend/connexion.php>Connexion ici</a></p>";
                    } else {
                        $erreur = "<p>Ce PSEUDO est déjà pris par un autre utilisateur.</p>";

                    }
                } else {
                    $erreur = " <p>Les mots de passes ne correspondent pas!</p>";
                }
            } else {
                $erreur = "<p>Votre pseudo ne doit pas etre superieur à 20 caracteres!</p>";
            }
        } else {
            $erreur = "<p>Le pseudo ne peut contenir certins caractères spéciaux!  </p>";
        }

    } else {
        $erreur = "<p>Tous les champs doivent être remplis! </p>";

    }
}
?>