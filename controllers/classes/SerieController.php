<?php
/**
 * Created by PhpStorm.
 * User: windf
 * Date: 21/11/2018
 * Time: 20:38
 */
include 'Entrainement.php';
class SerieController {
    private $training;
    private $serie;
    private $nbrSerie;
    private $nbrVolee;
    private $nbrTir;
    private $idEnt;
    public function __construct($training, $data) {
        $this->training = $training;
        $this->nbrSerie = $training->getNbrSerie();
        $this->nbrVolee = $training->getNbrVolee();
        $this->nbrTir = $training->getNbrTir();
        $this->serie = $data;
        /*
        $this->serie = array_fill(0, $training->getNbrSerie(), []);
        for ($i = 0; $i < $this->nbrSerie; $i++) {
            $this->serie[$i] = array_fill(0, $this->nbrVolee, []);
        }
        for ($j = 0; $j < $this->nbrSerie; $j++) {
            for ($k = 0; $k < $this->nbrVolee; $k++) {
                $this->serie[$j][$k] = array_fill(0, $this->nbrTir, 0);
            }
        }*/
    }

    public function getVoleeStat($numSerie, $numVolee) {
        if($numSerie > $this->nbrSerie || $numVolee > $this->nbrVolee) {
            echo "Erreur: cette serie ou cette volee n'existe pas";
            die();
        }
        $stats = array(
            "NbrPts" => null,
            "MoyennePts" => null,
            "Pct10" => null,
            "Pct9" => null
        );
        $sommePoints = 0.0;
        // On calcule la moyenne des points et on la place dans stats[]
        for($i = 0; $i < $this->nbrTir; $i++) {
            $sommePoints += $this->serie[$numSerie-1][$numVolee-1][$i];
        }
        $moyenneVolee = $sommePoints / $this->nbrTir;
        $stats["NbrPts"] = $sommePoints;
        $stats["MoyennePts"] = $moyenneVolee;
        //On calcule le pct de tir à 10, on a pct10 = (nbrTir10 / nbrTirTotal)*100
        //On compte d'abord le nombre de tir à 10...
        $nbrTir10 = 0.0;
        for($i = 0; $i < $this->nbrTir; $i++) {
            if($this->serie[$numSerie-1][$numVolee-1][$i] == 10) $nbrTir10++;
        }
        $pct10 = ($nbrTir10 / $this->nbrTir) * 100;
        $stats["Pct10"] = $pct10;
        //On calcule le pct de tir à 9
        $nbrTir9 = 0.0;
        for($i = 0; $i < $this->nbrTir; $i++) {
            if($this->serie[$numSerie-1][$numVolee-1][$i] == 9) $nbrTir9++;
        }
        $pct9 = ($nbrTir9 / $this->nbrTir) * 100;
        $stats["Pct9"] = $pct9;
        return $stats;
    }
    public function getSerieStat($numSerie) {
        if($numSerie > $this->nbrSerie || $numSerie < 1) {
            echo "Erreur: la serie demandée n'existe pas";
            die();
        }
        $stats = array(
            "NbrPts" => null,
            "MoyennePts" => null,
            "Pct10" => null,
            "Pct9" => null,
        );
        //On calcule la moyenne des pts
        $sumPts = 0.0;
        for($i = 0; $i < $this->nbrVolee; $i++) {
            for($j = 0; $j < $this->nbrTir; $j++) {
                $sumPts += $this->serie[$numSerie-1][$i][$j];
            }
        }
        $moyPts = $sumPts / ($this->nbrTir * $this->nbrVolee);
        $stats["NbrPts"] = $sumPts;
        $stats["MoyennePts"] = $moyPts;
        // On calcule le pct10 et on le store dans stats[]
        $nbrTir10 = 0.0;
        for($i = 0; $i < $this->nbrVolee; $i++) {
            for($j = 0; $j < $this->nbrTir; $j++) {
                if($this->serie[$numSerie-1][$i][$j] == 10) $nbrTir10++;
            }
        }
        $pct10 = ($nbrTir10 / ($this->nbrTir * $this->nbrVolee)) * 100;
        $stats["Pct10"] = $pct10;
        // On calcule le pct9 et on le store dans stats[]
        $nbrTir9 = 0.0;
        for($i = 0; $i < $this->nbrVolee; $i++) {
            for($j = 0; $j < $this->nbrTir; $j++) {
                if($this->serie[$numSerie-1][$i][$j] == 9) $nbrTir9++;
            }
        }
        $pct9 = ($nbrTir9 / ($this->nbrTir * $this->nbrVolee)) * 100;
        $stats["Pct9"] = $pct9;
        //On store les tableaux stats de chaque volee dans stats[]
        //$stats sera de la forme : ("MoyennePts" => null, "Pct10" => null, "Pct9" => null,
        // "Volee1" => $stats[], "Volee2" => $stats[], ...)
        for ($i = 0; $i < $this->nbrVolee; $i++) {
            $key = "Volee" . strval($i+1);
            $stats[$key] = $this->getVoleeStat($numSerie, $i+1);
        }
        return $stats;
    }
    //setter qui place le nombre de pts pour chaque tir
    //$data est de taille $nbrTirs et contient les valeurs des pts pour chaque tir
    public function setVolee($numSerie, $numVolee, $data) {
        foreach ($data as $fleche) {
            if ($fleche > 10 || $fleche < 0) {
                echo "<p>Erreur: pts de tir non valide</p>";
                //exit();
            }
        }
        if(count($data) > $this->nbrTir) {
            echo "<p>Erreur: trop de données de tir dans \$data</p>";
            die();
        } else if (count($data) < $this->nbrTir) {
            echo "<p>Erreur: il manque des données de tir dans \$data</p>";
            die();
        } else {
            for($i = 0; $i < $this->nbrTir; $i++) {
                if($data[$i] != null) {
                    $this->serie[$numSerie-1][$numVolee-1][$i] = $data[$i];
                }
            }
        }
    }
    public function setTir($numSerie, $numVolee, $numTir, $value) {
        $this->serie[$numSerie-1][$numVolee-1][$numTir-1] = $value;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function getSerie() {
        return $this->serie;
    }
    public function getNbrVolee() {
        return $this->nbrVolee;
    }
    public function getNbrTir() {
        return $this->nbrTir;
    }
    public function getPtsSerie($numSerie) {
        return $this->getSerieStat($numSerie)["NbrPts"];
    }
    public function getMoySerie($numSerie) {
        return $this->getSerieStat($numSerie)["MoyennePts"];
    }
    public function getPct10Serie($numSerie) {
        return $this->getSerieStat($numSerie)["Pct10"];
    }
    public function getPct9Serie($numSerie) {
        return $this->getSerieStat($numSerie)["Pct9"];
    }
    public function getPtsVolee($numSerie, $numVolee) {
        return $this->getVoleeStat($numSerie, $numVolee)["NbrPts"];
    }
    public function getMoyVolee($numSerie, $numVolee) {
        return $this->getVoleeStat($numSerie, $numVolee)["MoyennePts"];
    }
    public function getPct10Volee($numSerie, $numVolee) {
        return $this->getVoleeStat($numSerie, $numVolee)["Pct10"];
    }
    public function getPct9Volee($numSerie, $numVolee) {
        return $this->getVoleeStat($numSerie, $numVolee)["Pct9"];
    }
    public function reset() {
        $this->nbrTir = 0;
        $this->serie = [];
    }
}
/*
$training = new Entrainement('nom', 'lieu', '', '10', '1', '1', 2, 3, 10, 1);
$serieController = new SerieController($training);
$data = [9, 9, 9, 9, 9, 9, 9, 9, 9, 9];
$data2 = [9, 9, 9, 9, 9, 9, 9, 9, 9, 9];
$data3 = [9, 9, 9, 9, 9, 9, 9, 9, 9, 9];
$data4 = [null, null, null, null, null, null, null, null, null, 5];
$serieController->setVolee(1, 1, $data);
$serieController->setVolee(1, 2, $data2);
$serieController->setVolee(1, 3, $data3);
$arr = $serieController->getSerie();
$stats = $serieController->getSerieStat(1);
var_dump($arr);
$serieController->setVolee(1, 1, $data4);
$arr = $serieController->getSerie();
var_dump($arr);
$serieController->setTir(1, 1, 10, 0);
$arr = $serieController->getSerie();
var_dump($arr);*/
?>