<?php

//$tab["nomdutruc"] = $vartruc;

class entrainement
{
    // private $tabTrain = array(nbserie, nbvolees, nbfleche);
    //private $tabTrain[$nbserie][$nbvolees][$nbfleches];

    private $tab = array();
    private $nom;
    private $lieu;
    private $date;
    private $distance;
    private $nbserie;
    private $nbvolees;
    private $nbfleches;
    private $ID_blason;
    private $ID_arc;
    private $ID_user;

    public function __construct($nom, $lieu, $date, $distance, $ID_arc, $ID_blason, $nbserie, $nbvolees, $nbfleches, $ID_user)
    {
        //$tab[$nbserie] = array( $nbvolees => array( $nbfleches, $nbfleches, $nbfleches));
        $this->ID_blason = $ID_blason;
        $this->ID_arc = $ID_arc;
        $this->nom = $nom;
        $this->lieu = $lieu;
        $this->date = $date;
        $this->distance = $distance;
        $this->nbserie = $nbserie;
        $this->nbvolees = $nbvolees;
        $this->nbfleches = $nbfleches;
        $this->ID_user = $ID_user;


        // echo 'objet instancié';


        $this->creerEntrainement($this->nom, $this->lieu, $this->date, $this->distance, $this->ID_arc, $this->ID_blason, $this->nbserie, $this->nbvolees, $this->nbfleches, $this->ID_user);


    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    public function checkEnt($nom, $lieu, $date, $distance, $ID_arc, $ID_blason, $nbserie, $nbvolees, $nbfleches, $ID_user)
    { //on check si les valeurs saisi sont valides pour etre envoyés dans la base de données.


        if (!empty($ID_blason) and !empty($ID_arc) and !empty($nom) and !empty($lieu) and !empty($date)
            and !empty($distance) and !empty($nbserie) and !empty($nbvolees) and !empty($nbfleches)) {


            if (is_numeric($ID_blason) and is_numeric($ID_arc) and strlen($nom) <= 30 and strlen($lieu) <= 200
                and $this->verifdateheure($date) and is_numeric($distance) and $distance <= 125
                and is_numeric($nbserie) and $nbserie <= 5 and is_numeric($nbvolees) and $nbvolees <= 10 and is_numeric($nbfleches) and $nbfleches <= 10) {
                echo $ID_user;
                echo $nom;
                include '../../backend/includes/connexion_bdd.php';
                // Pour test: include '../includes/connexion_bdd.php';

                // on verifie la validité de l'utilisateur:

                $stmt = $bdd->query("SELECT ID_USER FROM users WHERE ID_USER='$ID_user'");
                $nbrOccur = $stmt->rowCount();

                if ($nbrOccur == 1) {

                    //on verifie si le nom de l'entrainement existe deja chez le meme user
                    // $stmt = $bdd->query("SELECT * FROM entrainement WHERE entrainement.ID_USER='$ID_user' and NOM_ENT='$nom'");

                    $stmt = $bdd->query("SELECT * FROM `entrainement` WHERE ID_USER='$ID_user' and NOM_ENT='$nom'");

                    $nbrOccur = $stmt->rowCount();

                    if ($nbrOccur == 0) {
                        return true;


                    } else {
                        echo "<p>Ce nom d'entrainement est déjà utilisé.</p>";
                        return false;
                    }
                } else {
                    echo "<p>Erreur Identifiant utilisateur!</p>";
                    return false;
                }


            } else {
                echo '<p>Valeurs saisis invalides!</p>';
                return false;

            }


        } else {

            echo '<p>Merci de fournir toutes les informations demandées!</p>';
            return false;

        }


    }

////////////////////////////////////////////////////////////////////////////////////////////
    function verifdateheure($dateheure)
    {


        if (($timestamp = strtotime($dateheure)) === false) {
            return false;
        } else {
            return true;
        }

    }

    public static function genIdEntrainement($ID_ENT, $ID_user)
    { // Cette fonction sert à generer un nouveau ID entrainement en fusionnant le ID user avec celui d'entrainement

        $ID_ENT_USER = intval($ID_user . '00' . $ID_ENT);

        return $ID_ENT_USER;


    }

////////////////////////////////////////////////////////////////////////////////////////////


    public function creerEntrainement($nominput, $lieuinput, $date, $distance, $ID_arc, $ID_blason, $nbserie, $nbvolees, $nbfleches, $ID_user)
    {

        $nom = addslashes($nominput);
        $lieu = addslashes($lieuinput);
        if ($this->checkEnt($nom, $lieu, $date, $distance, $ID_arc, $ID_blason, $nbserie, $nbvolees, $nbfleches, $ID_user) == true) {


            include '../../backend/includes/connexion_bdd.php';
            // include '../includes/connexion_bdd.php';


            $requ = $bdd->exec("INSERT INTO `entrainement` (`ID_ENT`,`ID_ENT_USER`, `ID_USER`, `ID_ARC`, `ID_BLAS`, `NOM_ENT`, `LIEU_ENT`, `DATE_ENT`, `DIST_ENT`,`NBR_SERIE`,`NBR_VOLEE`, `NBR_FLECHES`, `PTS_TOTAL`, `PCT_DIX`, `PCT_NEUF`, `MOY_ENT`, `STATUT_ENT`) 
            VALUES (NULL,1, '$ID_user', '$ID_arc', '$ID_blason', '$nom', '$lieu', '$date', '$distance','$nbserie','$nbvolees', '$nbfleches', NULL, NULL, NULL, NULL, '1')") or die(print_r($bdd->errorInfo()));

            $requ2 = $bdd->query("SELECT ID_ENT FROM entrainement WHERE ID_USER='$ID_user' AND ID_ARC='$ID_arc' AND ID_BLAS='$ID_blason' 
            AND NOM_ENT='$nom' AND LIEU_ENT='$lieu' and DATE_ENT='$date' AND DIST_ENT='$distance' AND NBR_SERIE='$nbserie' AND NBR_VOLEE='$nbvolees' AND NBR_FLECHES='$nbfleches'") or die(print_r($bdd->errorInfo()));


            $donnees = $requ2->fetch();

            $ID_ENT = $donnees['ID_ENT'];

            $new_ID_Ent = $this->genIdEntrainement($ID_ENT, $ID_user);
            echo $new_ID_Ent;
            $requ3 = $bdd->exec("UPDATE `entrainement` SET `ID_ENT_USER` = '$new_ID_Ent' WHERE `entrainement`.`ID_ENT` = '$ID_ENT' AND `entrainement`.`NOM_ENT` = '$nom'") or die(print_r($bdd->errorInfo()));


            for ($i = 0; $i < $nbserie; $i++) {

                $requ4 = $bdd->exec("INSERT INTO `serie` (`ID_SERIE`, `ID_ENT_USER`, `PTSSERIE`, `NBRVOLSERIE`, `MOYSERIE`, `PCTDIXSERIE`, `PCTHUITSERIE`, `ID_ENT`) 
                  VALUES (NULL,'$new_ID_Ent', NULL, '$nbvolees', NULL, NULL, NULL, '$ID_ENT') ") or die(print_r($bdd->errorInfo()));


                $requ5 = $bdd->query("SELECT ID_SERIE FROM serie WHERE ID_ENT_USER='$new_ID_Ent' and NBRVOLSERIE='$nbvolees' and ID_ENT='$ID_ENT'") or die(print_r($bdd->errorInfo()));


                $donnees2 = $requ5->fetch();

                $ID_SERIE = $donnees2['ID_SERIE'];

                for ($j = 0; $j < $nbvolees; $j++) {


                    $requ6 = $bdd->exec("INSERT INTO `volee` (`ID_VOL`, `ID_SERIE`, `PTSVOL`, `NBRFLECHEVOL`, `MOYVOL`, `PCTDIXVOL`, `PCTHUITVOL`) 
                              VALUES (NULL, '$ID_SERIE', NULL, '$nbfleches', NULL, NULL, NULL)")or die(print_r($bdd->errorInfo()));

                    $requ7 = $bdd->query("SELECT ID_VOL FROM volee WHERE ID_SERIE='$ID_SERIE' and NBRFLECHEVOL='$nbfleches'") or die(print_r($bdd->errorInfo()));


                    $donnees3 = $requ7->fetch();

                    $ID_VOLEE = $donnees3['ID_VOL'];

                    for ($z = 0; $z < $nbfleches; $z++) {
                        $requ7 = $bdd->exec("INSERT INTO `fleche` (`ID_FLECHE`, `ID_VOL`, `PTSFLECHE`) 
                        VALUES (NULL,'$ID_VOLEE', NULL)") or die(print_r($bdd->errorInfo()));




                    }
                }


            }


            echo '<p> Entranement crée! </p>';

        }


    }
////////////////////////////////////////////////////////////////////////////////////////////
    /* public function lancerEntrainement($nbserie, $nbvolees, $nbfleches)
   {


       for ($i = 0; $i <= $nbserie; $i++) {

           for ($j = 0; $j <= $nbvolees; $j++) {

               inculde();


               htmlForm(recup dans int[][][nbfleche] des points)
                       statVolee(tabTrain, iS, iV)
                       bddexec()

           }

       }


   }
*/


}

$nom = "
}nom1";
$lieu = "lieu1";
$date = "2018-12-07 01:30";
$distance = 15;
$id_arc = 1;
$ID_blason = 1;
$nbserie = 2;
$nbvolees = 5;
$nbfleches = 3;

//$ent1=new entrainement($nom,$lieu,$date,$distance,$id_arc,$ID_blason,$nbserie,$nbvolees,$nbfleches);
//$ent1->creerEntrainement($nom,$lieu,$date,$distance,1,$ID_blason,$nbserie,$nbvolees,$nbfleches);
//$genENTRAINEMENTID=entrainement::genIdEntrainement(8,1);
//echo $genENTRAINEMENTID;

?>
