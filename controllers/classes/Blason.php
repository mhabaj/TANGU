<?php

/**
 * Effectu la connexion a la base de donné pour permettre les transferts dans la classe.
 */
require_once('controllers/classes/ConnexionBDD.php');
//require_once('../controllers/classes/ConnexionBDD.php');

/**
 * Inclut le fichier log pour garder une trace des actions effectuées dans Blason.
 */
require_once('controllers/classes/Log.php');
//require_once('../controllers/classes/Log.php');
//global $logFile;

/**
 * Class Blason
 */
class Blason
{

    /**
     * ID du blason générer par la base de données.
     * @var int
     */
    private $idBlas;

    /**
     * ID de l'utilisateur a qui l'arc appartient.
     * @var int
     */
    private $idUser;

    /**
     * Nom de blason.
     * @var string
     */
    private $nom;

    /**
     * Taille du blason.
     * @var int
     */
    private $taille;

    /**
     * Emplacement de la photo du blason.
     * @var string
     */
    private $photo;

    /**
     * Blason constructor.
     * @param $nom
     * @param $taille
     * @param $photo
     * @param $idUser
     */
    public function __construct($nom, $taille, $photo, $idUser)
    {


        $this->idUser = $idUser;
        $this->nom = addslashes($nom);
        $this->taille = $taille;
        $this->photo = $photo;


        //Inserer valeurs à la creation d une nouvelle instance
        $this->creerBlason();

        //Recuper l'id du blason
        $this->idBlas = $this->getBlasonID();

    }

    /**
     * Renvoie l'ID du blason..
     * Utile pour ensuite le recuperer dans la base de données.
     * @return mixed
     */
    public function getBlasonID()
    {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        //selectionne l'ID du blason dans la base de données.
        $requete = "SELECT ID_BLAS FROM blason WHERE ID_USER = ? AND NOMBLAS = ? AND TAILLEBLAS = ? AND PHOTOBLAS = ?";
        $stmt = $con->prepare($requete);
        $stmt->execute([$this->idUser, $this->nom, $this->taille, $this->photo]);
        $result = $stmt->fetchColumn();

        return $result;
    }

    /**
     * Vérifie si les valeurs du blason sont valides.
     * Appeller avant d'envoyer les valeurs dans la base de données.
     * @return bool
     */
    public function checkBlason()
    {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        //selectionne l'ID du blason dans la base de données.
        $requete = "SELECT COUNT(ID_BLAS) FROM blason WHERE NOMBLAS = ? AND ID_USER = ?";
        $stmt = $con->prepare($requete);
        $stmt->execute([$this->nom, $this->idUser]);
        $result = $stmt->fetchColumn();
        if ($result == 0) {
            return false;
        } else {
            echo '<p>Ce blason existe deja</p>';
        }
        return true;

    }

    /**
     * Récupère ces valeurs et les envoies dans la base de données.
     * Utilise checkBlason.
     */
    public function creerBlason()
    {
        global $logFile;

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        if ($this->checkBlason() == false) {
            //Insérer données dans la DB
            $requete = "INSERT INTO blason (ID_USER, NOMBLAS, TAILLEBLAS, PHOTOBLAS) VALUES (:idUser, :nomBlas, :tailleBlas, :photoBlas)";

            $add = $con->prepare($requete);
            $add->bindParam(':idUser', $this->idUser);
            $add->bindParam(':nomBlas', $this->nom);
            $add->bindParam(':tailleBlas', $this->taille);
            $add->bindParam(':photoBlas', $this->photo);

            //Inserer la ligne
            $add->execute();

            //Inserer dans le fichier log l'action effectuée
            $log_message = "Nouveau blason crée par idUser: " . $this->idUser;

            //$logFile->open();
            //$logFile->write($log_message);
            //$logFile->close();
        }
    }

    /**
     * Supprime le blason de la base de données.
     */
    public function supprimerBlason()
    {

        global $logFile;

        //Effacer données du blason
        //Valeur $id a prendre dans l'url
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        $blasID = $this->idBlas;
        $requete = "DELETE FROM blason WHERE ID_BLAS = '$blasID'";

        $con->exec($requete);

        //Inserer dans le fichier log l'action effectuée
        $log_message = "idBlas: " . $blasID . " supprimé par idUser: " . $this->idUser;

        //$logFile->open();
        //$logFile->write($log_message);
        //$logFile->close();
    }
}

//$nom = "Nom Blas";
//$nom2 = "Nom";
//$taille = 25;
//$photo = "photo blason";

//$attr = array("NOMBLAS" => "nouveau nom", "TAILLEBLAS" => NULL, "PHOTOBLAS" => "nouvelle photo");

//$blason = new Blason($nom, $taille, $photo);
//$blason->modifierBlason($attr);
//$blason2 = new Blason($nom2, $taille, $photo);
//$blason->supprimerBlason();
//$blason2->modifierBlason($attr);
//$blason2->supprimerBlason();
?>