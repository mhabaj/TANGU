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

    }


    public function checkEnt()
    {

        if (!empty($ID_blason) and !empty($ID_arc) and !empty($nom) and !empty($lieu) and !empty($date)
            and !empty($distance) and !empty($nbserie) and !empty($nbvolees) and !empty($nbfleches)) {

                if (is_numeric($ID_blason) and is_numeric($ID_arc) and sterlen($nom) <= 30 and sterlen($lieu) <= 200
                     and verifDate($date) == true and is_numeric($distance) and $distance<=125
                    and is_numeric($nbserie) and $nbserie<=5 and is_numeric($nbvolees) and $nbvolees<=10 and is_numeric($nbfleches) and $nbfleches<=10) {




            }
        }


    }

    public function verifDate($input)
    {
        $date = html($_POST[$input]);
        list($d, $m, $y) = explode('-', $date);
        if (!checkdate($d, $m, $y)) {

            echo '<p> Date non valide</p>';
            return false;
        } else {

            return true;
        }

    }

    public function creerEntrainement()
    {


    }

    public function lancerEntrainement($nbserie, $nbvolees, $nbfleches)
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


}




