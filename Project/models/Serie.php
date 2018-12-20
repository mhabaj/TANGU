<?php


class Serie {
    private $serieController;
    private $serieData;
    private $nbrSerie;
    private $nbrVolee;
    private $nbrTir;
    private $idEnt;

    public function __construct($serieController) {
        $this->serieController = $serieController;
        $this->idEnt = 1;
        $this->serieData = $serieController->getSerie();
        $this->nbrSerie = count($this->serieData);
        $this->nbrVolee = count($this->serieData[0]);
        $this->nbrTir = count($this->serieData[0][0]);
    }

    public function insertData() {
        if(!$this->checkVolees()) {
            throw new Exception('les tirs ne sont pas valides');
            //echo "<p>Erreur: les tirs ne sont pas valides</p>";
            die();
        }

        if(!$this->checkIdEnt()) {
            throw new Exception("Can't insert more than once for the same idEnt");
            //echo "<p>Erreur: on ne peut pas insérées plusieurs fois pour un meme idEnt</p>";
            die();
        }

        $db = new ConnexionBDD();
        $con = $db->getCon();

        //Insert series data
        $query = "INSERT INTO serie (ID_ENT, PTSSERIE, NBRVOLSERIE, MOYSERIE, PCTDIXSERIE, PCTNEUFSERIE) VALUES (:idEnt, :ptsSerie, :nbrVolee, :moySerie, :pct10, :pct9)";
        $stmt = $con->prepare($query);
        for($i = 1; $i <= $this->nbrSerie; $i++) {
            try {

                $nbrPtsSerie = $this->serieController->getPtsSerie($i);
                $nbrVolee = $this->serieController->getNbrVolee();
                $moySerie = $this->serieController->getMoySerie($i);
                $pct10 = $this->serieController->getPct10Serie($i);
                $pct9 = $this->serieController->getPct9Serie($i);

                $stmt->bindParam('idEnt', $this->idEnt);
                $stmt->bindParam('ptsSerie', $nbrPtsSerie);
                $stmt->bindParam('nbrVolee', $nbrVolee);
                $stmt->bindParam('moySerie', $moySerie);
                $stmt->bindParam('pct10', $pct10);
                $stmt->bindParam('pct9', $pct9);

                $stmt->execute();
                echo "<p>Succès: données de série insérées</p>";
            } catch (PDOException $e) {
                die("Erreur insertion stats serie: " . $e->getMessage());
            }
        }

        //Insert volees data
        $query = "INSERT INTO volee (ID_SERIE, PTSVOL, NBRFLECHEVOL, MOYVOL, PCTDIXVOL, PCTNEUFVOL) VALUES (:idSerie, :ptsVolee, :nbrTirs, :moyVolee, :pct10, :pct9)";
        $stmt = $con->prepare($query);

        $idSerie = $this->getSerieID();

        for($i= 1; $i <= $this->nbrSerie; $i++) {
            for($j = 1; $j <= $this->nbrVolee; $j++) {
                try {

                    $nbrPtsVolee = $this->serieController->getPtsVolee($i, $j);
                    $nbrTirs = $this->serieController->getNbrTir();
                    $moyVolee = $this->serieController->getMoyVolee($i, $j);
                    $pct10 = $this->serieController->getPct10Volee($i, $j);
                    $pct9 = $this->serieController->getPct9Volee($i, $j);

                    $stmt->bindParam('idSerie', $idSerie[$i]);
                    $stmt->bindParam('ptsVolee', $nbrPtsVolee);
                    $stmt->bindParam('nbrTirs', $nbrTirs);
                    $stmt->bindParam('moyVolee', $moyVolee);
                    $stmt->bindParam('pct10', $pct10);
                    $stmt->bindParam('pct9', $pct9);

                    $stmt->execute();
                    echo "<p>Succès: données de série insérées</p>";
                } catch (Exception $e) {
                    die("Erreur insertion stats volee: " . $e->getMessage());
                }
            }
        }
    }

    public function pullData() {

    }

    //Return an array with id for each series
    //Must be called after insertion of serie data;
    public function getSerieID() {
        $db = new ConnexionBDD();
        $con = $db->getCon();

        $query = "SELECT ID_SERIE FROM serie WHERE ID_ENT = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$this->idEnt]);
        $result = $stmt->fetchAll();

        $idSerie = array();
        for($i = 0; $i < count($result); $i++) {
            for ($j = 0; $j < count($result[$i]); $j++) {
                $idSerie[$i+1] = $result[$i]["ID_SERIE"];
            }
        }

        return $idSerie;
    }

    public function checkIdEnt() {
        $db = new ConnexionBDD();
        $con = $db->getCon();

        $query = "SELECT COUNT(ID_ENT) FROM serie WHERE ID_ENT = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$this->idEnt]);
        $result = $stmt->fetchColumn();
        if($result != 0) return false;
        return true;
    }

    public function checkVolees() {

        for ($i = 0; $i < $this->nbrSerie; $i++) {
            for ($j = 0; $j < $this->nbrVolee; $j++) {
                for($k = 0; $k < $this->nbrTir; $k++) {
                    if($this->serieData[$i][$j][$k] > 10 || $this->serieData[$i][$j][$k] < 0) return false;
                }

            }
        }

        return true;
    }
}

/*
$training = new Entrainement('nom', 'lieu', '', '10', '1', '1', 3, 2, 5, 1);
$serieController = new SerieController($training);
$data = [10, 0, 9, 2, 10];
$serieController->setVolee(1, 1, $data);
$serieController->setVolee(1, 2, $data);
$serieModel = new Serie($serieController);
try {
    $serieModel->insertData();
} catch (Exception $e) {
    echo 'Message: ' .$e->getMessage();
}*/