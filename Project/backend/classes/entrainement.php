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

    public function __construct($nom, $lieu, $date, $distance, $ID_arc, $ID_blason, $nbserie, $nbvolees, $nbfleches)
    {
        //$tab[$nbserie] = array( $nbvolees => array( $nbfleches, $nbfleches, $nbfleches));
        $this->$ID_blason = $ID_blason;
        $this->$ID_arc = $ID_arc;
        $this->$nom = $nom;
        $this->$lieu = $lieu;
        $this->$date = $date;
        $this->$distance = $distance;
        $this->$nbserie = $nbserie;
        $this->$nbvolees = $nbvolees;
        $this->$nbfleches = $nbfleches;



        echo 'objet instancié';

    }


    public function checkEnt($ID_blason, $ID_arc, $nom, $lieu, $date, $distance, $nbserie, $nbvolees, $nbfleches)
    { //on check si les valeurs saisi sont valides pour etre envoyés dans la base de données.


        if (!empty($ID_blason) and !empty($ID_arc) and !empty($nom) and !empty($lieu) and !empty($date)
            and !empty($distance) and !empty($nbserie) and !empty($nbvolees) and !empty($nbfleches)) {

            if (is_numeric($ID_blason) and is_numeric($ID_arc) and strlen($nom) <= 30 and strlen($lieu) <= 200
                /* and entrainement::verifDate($date) == true */ and is_numeric($distance) and $distance <= 125
                and is_numeric($nbserie) and $nbserie <= 5 and is_numeric($nbvolees) and $nbvolees <= 10 and is_numeric($nbfleches) and $nbfleches <= 10) {
                return true;

            } else {
                echo '<p>Valeurs saisis invalides!</p>';
                return false;

            }


        } else {

            echo '<p>Merci de fournir toutes les informations demandées!</p>';
            return false;

        }


    }

    public function verifDate($input)
    {

        list($d, $m, $y) = explode('-', $input);
        if (!checkdate($d, $m, $y)) {

            echo '<p> Date non valide</p>';
            return false;
        } else {

            return true;
        }

    }

    public function creerEntrainement($ID_blason, $ID_arc, $nom, $lieu, $date, $distance, $nbserie, $nbvolees, $nbfleches)
    {

        if (entrainement::checkEnt($ID_blason, $ID_arc, $nom, $lieu, $date, $distance, $nbserie, $nbvolees, $nbfleches) == true) {


           // include '../backend/includes/connexion_bdd.php';
            include '../includes/connexion_bdd.php';
            $requ = $bdd->exec("INSERT INTO `entrainement` (`ID_ENT`, `ID_USER`, `ID_ARC`, `ID_BLAS`, `NOM_ENT`, `LIEU_ENT`, `DATE_ENT`, `DIST_ENT`, `NBR_FLECHES`, `PTS_TOTAL`, `PCT_DIX`, `PCT_NEUF`, `MOY_ENT`, `STATUT_ENT`) VALUES (NULL, '1', '$ID_arc', '$ID_blason', '$nom', '$lieu', '2018-11-14 00:00:00', '$distance', '$nbfleches', NULL, NULL, NULL, NULL, '1')");


            echo '<p> Entranement crée! </p>';

        }


    }

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
$ent1=new entrainement('nom1', 'lieu1', '2018-11-14 00:00:00', 15, 1, 1, 2, 5, 3);
$ent1->creerEntrainement(1, 1,'nom1' , 'lieu1', '2018-11-14 00:00:00', 15, 2, 5, 3);









?>
