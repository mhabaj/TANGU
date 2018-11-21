<?php
/**
 * Created by PhpStorm.
 * User: windf
 * Date: 21/11/2018
 * Time: 20:38
 */
include 'Entrainement.php';

class Serie {

    private $training;
    private $serie;
    private $nbrSerie;
    private $nbrVolee;
    private $nbrTir;

    public function __construct($training) {
        $this->training = $training;
        $this->nbrSerie = $training->getNbrSerie();
        $this->nbrVolee = $training->getNbrVolee();
        $this->nbrTir = $training->getNbrTir();
        $this->serie = array_fill(0, $training->getNbrSerie(), []);

        for ($i = 0; $i < $this->nbrSerie; $i++) {
            $this->serie[$i] = array_fill(0, $this->nbrVolee, []);
        }

        for ($j = 0; $j < $this->nbrSerie; $j++) {
            for ($k = 0; $k < $this->nbrVolee; $k++) {
                $this->serie[$j][$k] = array_fill(0, $this->nbrTir, 0);
            }
        }

    }

    public function getSerie() {
        return $this->serie;
    }

    public function reset() {
        $this->nbrTir = 0;
        $this->serie = [];
    }


}

$training = new Entrainement('nom', 'lieu', '3 October 2005', '10', '1', '1', 5, 6, 10, 1);
$serie = new Serie($training);
$arr = $serie->getSerie();

?>