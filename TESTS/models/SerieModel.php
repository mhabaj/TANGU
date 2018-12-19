<?php
/**
 * Created by PhpStorm.
 * User: windf
 * Date: 25/11/2018
 * Time: 23:48
 */
include '../controllers/classes/ConnexionBDD.php';

class SerieModel {

    private $idEnt;
    private $idSerie;

    public function __construct($idEnt) {
        $this->idEnt = $idEnt;
    }

    public function create() {
        var_dump($this->idSerie);

        $db = new ConnexionBDD();
        $con = $db->getCon();

        try {
            $query = "INSERT INTO serie (ID_ENT) VALUES (:idEnt)";
            $stmt = $con->prepare($query);
            $stmt->bindParam('idEnt', $this->idEnt);
            $stmt->execute();

            $idSerie = $con->lastInsertId();
            echo "<p>Succes: creation d'une nouvelle serie</p>";
        } catch (PDOException $e) {
            die('Erreur creation de la serie: ' . $e->getMessage());
        }

        return $idSerie;
    }

    public function insert($name, $data) {
        $db = new ConnexionBDD();
        $con = $db->getCon();
        try {
            $query = "UPDATE serie SET ". $name ."=? WHERE ID_ENT = ? AND ID_SERIE = ?";
            $stmt = $con->prepare($query);
            $stmt->execute([$data, $this->idEnt, $this->idSerie]);

            echo "<p>Succes: données insérées</p>";
        } catch (PDOException $e) {
            die('Erreur insertion des données dans SerieModel: ' . $e->getMessage());
        }

    }

    public function getIDSerie() {
        return $this->idSerie;
    }
}

$s = new SerieModel(0);
var_dump($s->getIDSerie());
?>